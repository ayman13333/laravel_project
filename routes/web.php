<?php
use App\Http\Controllers\setLanguage;
//use App\Http\config\LaravelLocalization;
//use App\Http\Kernel;
//use APP\Http\mcamara/laravel-localization;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use  Illuminate\Routing\RouteFileRegistrar;
use Illuminate\Support\Facades\App;

use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group([
  'prefix' => LaravelLocalization::setLocale(),
'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function()
{
	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
	Route::get('/', function()
	{
    return View('welcome');
	});
    Route::get('/home', function () {
       // return redirect('/');
      return redirect(LaravelLocalization::localizeUrl('/'));
       // return view('/');
     });
    //  Route::post('/logout', function () {
    //    return redirect(LaravelLocalization::localizeUrl('/'));
    //   });

  Route::get('/login',[LoginController::class,'showLoginForm']);
  Route::get('/register',[RegisterController::class,'showRegistrationForm']);
  //controller routes
  Route::resource('/books',BookController::class)->middleware(['auth','isadmin']);
  Route::resource('/clients',ClientController::class);
  Route::resource('/sessions',SessionController::class);
  Route::resource('/courses',CourseController::class);
  Route::POST('/courses/addcourse',[CourseController::class,'insertcourse'])->name('insertcourse');
  Route::get('/client/userscourses',[ClientController::class,'allcourses'])->name('allcourses');

 //Route::get('/courses/video',[CourseController::class,'insertcourse'])->name('insertcourseeee');
  //admin store page
  Route::POST('/clients/create/admin',[ClientController::class,'storeAdmin'])->name('storeAdmin');
  Route::get('/user/books',[BookController::class,'allbooks'])->name('users.books');
  //videes page route
  Route::get('/videos',[BookController::class,'videos'])->name('videos');
  // payment route
  Route::POST('/user/books/pay',[PaymentController::class,'pay'])->name('payment');
  //buy books form
  Route::get('/user/books/form/{id}/bookname/{bookname}',[PaymentController::class,'buybooksform'])->name('buybooksform');
   //success route
 Route::get('/success',[PaymentController::class,'success']);
 //error route
 Route::get('/error',[PaymentController::class,'error']);
 //download book route
 Route::get('/user/books/download/{id}',[BookController::class,'download'])->name('book.download');

});



//to make arabic as default language
Route::get('/', function () {
    return redirect('/ar');
  });
Auth::routes();

