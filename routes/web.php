<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// home
Route::get('/', 'HomeController@index')->name('home');
Route::any('/product/new-arrival', 'ProductController@newArrival')->name('new-arrival');

// Product route
Route::prefix('category')->group(function () {
    Route::get('/{id}', 'ProductController@index');
    Route::get('/{id}/{variantId}', 'ProductController@show');
});

Route::get('/product/{id}', 'ProductController@show');


//admin dashboard
Route::prefix('dashboard')->group(function(){
    Route::get('/', 'Dashboard\DashboardController@index');

    Route::get('/customer', 'Dashboard\DashboardController@customer');

    Route::get('/staff', 'Dashboard\DashboardController@staff');
    Route::get('/staff/add', 'Dashboard\DashboardController@create');
    Route::post('/staff/add', 'Dashboard\DashboardController@store');
    Route::get('/staff/edit/{id}','Dashboard\DashboardController@edit');
    Route::match(['put', 'patch'], '/staff/edit/{id}','Dashboard\DashboardController@update');
    Route::delete('/staff/delete/{id}','Dashboard\DashboardController@destroy');



    Route::get('/product', 'Dashboard\DashboardController@product');
    Route::get('/product/add', 'ProductController@create');
    Route::post('/product/add', 'ProductController@store');
    Route::get('/product/edit/{id}', 'ProductController@edit');
    Route::match(['put', 'patch'], '/product/edit/{id}', 'ProductController@update');
    Route::delete('/product/delete/{id}', 'ProductController@destroy');
    Route::get('/product/{id}', 'ProductController@show');
});

// Authentication
Auth::routes();

//Customer service
Route::get('customer-service/{section_id}', array('as' => 'infoSection', 'uses' => 'HomeController@customerService'))
->where('section_id', '(how-to-buy-info|delivery-and-shipping-info|faq-info|online-exchange-and-return-policy-info|size-guide-info)');

//Company profile
Route::get('company-profile/{section_id}', array('as' => 'infoSection', 'uses' => 'HomeController@companyProfile'))
->where('section_id', '(brand-info|careers|privacy-policy|terms-and-conditions)');



