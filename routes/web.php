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

Route::get('/dashboard', function () {
    return view('dashboard');
});

// pages route 
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@index']);
Route::get('/about', ['uses' => 'PagesController@about', 'as' => 'about']);
Route::get('/contact', ['uses' => 'PagesController@contact', 'as' => 'contact']);

// facebook login
Route::get ( '/auth/redirect/{service}', 'SocialAuthController@redirect' );
Route::get ( '/auth/callback/{service}', 'SocialAuthController@callback' );



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
