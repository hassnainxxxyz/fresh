<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');
Route::post('/logout', 'AuthController@logout');

Route::middleware(['auth:api'])->group(function() {
    Route::get('/add-to-cart/{product}', 'AddToCartController@addToCart');
    Route::get('/remove-from-cart/{id}', 'AddToCartController@removeFromCart');
    Route::get('/update-cart/{id}/{qty}', 'AddToCartController@updateCart');




});



Route::middleware(['auth:api', 'APIAdmin'])->group(function () {
//    PRODUCT ROUTES
    Route::post('/products/{product}/update', 'ProductController@getUpdated');
    Route::get('/products/{slug}/force-delete', 'ProductController@forceDelete');
    Route::get('/products/{slug}/restore', 'ProductController@restore');
    Route::get('/products/get-trashed-products', 'ProductController@getTrashedProducts');
    Route::resource('/products', 'ProductController');

//    END PRODUCT ROUTES


//    CATEGORIES ROUTES
    Route::get('/fetch-related-categories/{product}', 'CategoryController@fetch');
    Route::get('/fetch-categories-pagination', 'CategoryController@indexPaginate');


//    END CATEGORIES ROUTES

    Route::resource('/categories', 'CategoryController');


});








Route::resource('/featured-products', 'FeaturedProductController');
Route::resource('/latest-products', 'FeaturedProductController');
Route::resource('/top-selling-products', 'TopSellingProductController');

Route::get('/search/{query}', 'SearchController@getResults');



Route::get('/featured-products/get/{limit}', 'FeaturedProductController@fetch');
Route::get('/latest-products/get/{limit}', 'LatestProductController@fetch');
Route::get('/top-selling-products/get/{limit}', 'TopSellingProductController@fetch');




//Route::middleware('auth:api')->post('/user', function (Request $request) {
//
//    $user = $request->user();
//
//    return $user;
//});


