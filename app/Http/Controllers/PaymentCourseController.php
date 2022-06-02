<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Omnipay\Omnipay ;
use App\Models\Course;
use App\Models\Client;
use Config;

class PaymentCourseController extends Controller
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
       // return $request;
        $course_id=$request->course_id;
        $price=Course::select('price_online','price_offline')->where('id','=',$course_id)->get();
       // return $price[0]->price_online;
        $username=$request->username;
        $phone=$request->phone;
        $email=$request->email;
        $type=$request->type;
        $address=$request->address;
        $course_name=$request->course_name;
     //  for setting price
       if($type=='book_online'){
           $price=$price[0]->price_online;
       }
       elseif($type=='book_offline'){
           $price=$price[0]->price_offline;
       }

        $request->session()->put('course_id', $course_id);
        $request->session()->put('course_name', $course_name);
        $request->session()->put('username', $username);
        $request->session()->put('phone', $phone);
        $request->session()->put('email', $email);
        $request->session()->put('address', $address);
        $request->session()->put('type', $type);

       try {
           $response=$this->gateway->purchase(array(
               'amount'=>$price,
               'currency'=>env('PAYPAL_CURRENCY'),
               'returnUrl'=>url('successCourse'),
               'cancelUrl'=>url('errorCourse')
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
     public function successCourse(Request $request){
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
          //return view('courses.successCoursepay');
//          return "done";
           $course_id=session('course_id');
        //   //for insert data in client table
           $username=session('username');
           $phone=session('phone');
           $email=session('email');
           $address=session('address');
           $type=session('type');
           $course_name=session('course_name');
           $type=='book_online'? $booked=0:$booked=1;

          Client::create([
             'username' => $username,
             'phone' => $phone,
             'email'=>$email,
             'address'=>$address,
             'type'=>$type,
             'book_name'=>$course_name,
             'booked'=>$booked,
         ]);
        //  //for type of course
         if($type=='book_online'){
          //get the selected course download
          $course= Course::findOrFail($course_id);
          return view('courses.successCoursepay',compact('id','course'));
         }
         else{
             //for offline course book
             return view('courses.successCourseOffline');
         }

      }
      else{
         return view('courses.errorCoursePay');
      }
     }
     else{
        // return 'Payment declined!';
        return view('courses.errorCoursePay');
     }

     }
     //for cancel url request
     public function errorCourse(){
   //  return 'User declined the payment!';
     return view('courses.errorCoursePay');
     }
   //buy course form
   public function buycourseform($course_id,$course_name){
      $course=Course::Find($course_id);
      return view('courses.buycourseform',compact('course'));
   }

}
