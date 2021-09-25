<?php
use Illuminate\Support\Facades\Route;

use App\Cart;
Route::get('/test', function() {


    dd(castToClass(Cart::class, $_SESSION['cart']));





});



Route::get('/admin/{any}', 'AdminController@index')->where('any', '.*');



Route::get('{any}', function() {
    return view('welcome');
})->where('any', '.*');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



