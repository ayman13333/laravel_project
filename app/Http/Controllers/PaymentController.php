<?php

namespace App\Http\Controllers;
//use Omnipay\Common\Omnipay;
use Illuminate\Http\Request;
//use Omnipay\Omnipay as Omnipay;
use PhpParser\Node\Stmt\TryCatch;
//use App\Http\Controllers\Ominpay;
//use App\Http\Controllers\Omnipay ;
//use Omnipay\Omnipay as Omnipay;
//use  App\Http\Controllers\Ominpay;
//use App\PayPal\Omnipay;
//use Omnipay\PayPal\Services\Omnipay;
//use Ignited\LaravelOmnipay\Facades\OmnipayFacade;
use Omnipay\Omnipay ;
use App\Models\Book;
use App\Models\Client;
use Config;
//use Ignited\LaravelOmnipay\Facades\Omnipay;

class PaymentController extends Controller
{
    //
    private $gateway;
    //public $book_id;
    public function __construct()
    {
        //$Omnipay = new Omnipay;
       // $this->book_id;
        $this->gateway= Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }
    public function pay(Request $request){
       //return $request;
      $book_id=$request->book_id;
      $username=$request->username;
      $phone=$request->phone;
      $email=$request->email;
      $type=$request->type;
      $address=$request->address;
      $book_name=$request->book_name;
      //for setting price
      if($type=='pdf'){
          $price=10;
      }
      elseif($type=='insideEgypt'){
          $price=25;
          //$price=50;
      }
      else{
          $price=50;
      }
      $request->session()->put('book_id', $book_id);
      $request->session()->put('username', $username);
      $request->session()->put('phone', $phone);
      $request->session()->put('email', $email);
      $request->session()->put('address', $address);
      $request->session()->put('type', $type);
      $request->session()->put('book_name', $book_name);
      try {
          $response=$this->gateway->purchase(array(
              'amount'=>$price,
              'currency'=>env('PAYPAL_CURRENCY'),
              'returnUrl'=>url('success'),
              'cancelUrl'=>url('error')
          ))->send();
          if ($response->isRedirect()) {
            $response->redirect();
          }
          else{
              return $response->getMessage();
          }
      } catch (\Throwable $th) {
        return $th->getMessage();
      }
    }
    //for success request
    public function success(Request $request){
        //this is id of selected book
      // return  session('book_id');
    if ($request->input('paymentId')&&$request->input('PayerID') ) {
     $transaction=$this->gateway->completePurchase(  array(
         'payer_id'=>$request->input('PayerID'),
         'transactionReference'=>$request->input('paymentId')
     ));
     $response=$transaction->send();
       //for success pay
     if( $response->isSuccessful() ){
         $arr=$response->getData();
         $id=$arr['id'];
         $book_id=session('book_id');
         //for insert data in client table
         $username=session('username');
         $phone=session('phone');
         $email=session('email');
         $address=session('address');
         $type=session('type');
         $book_name=session('book_name');
         $type=='pdf'? $booked=0:$booked=1;
         
         Client::create([
            'username' => $username,
            'phone' => $phone,
            'email'=>$email,
            'address'=>$address,
            'type'=>$type,
            'book_name'=>$book_name,
            'booked'=>$booked,
        ]);
        //for type of book
        if($type=='pdf'){
         //get the selected book for pdf download
         $book= Book::findOrFail($book_id);
         return view('books.successBookspay',compact('id','book'));
        }
        else{
            //for hard copy book
            return view('books.successHardcopy');
        }

     }
     else{
        // return $response->getMessage();
        return view('books.errorBookspay');
     }
    }
    else{
       // return 'Payment declined!';
       return view('books.errorBookspay');
    }

    }
    //for cancel url request
    public function error(){
  //  return 'User declined the payment!';
    return view('books.errorBookspay');
    }
  //buy books form
    public function buybooksform($book_id,$book_name){
     // return $book_name;
     return view('books.buybooksform',compact('book_id','book_name'));
    }
}
