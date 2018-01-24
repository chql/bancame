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
Route::get('/', function () { return view('home'); })->name('home');

// Projects
Route::get('/projects/search', 'ProjectController@search')->name('projects');

Route::get('/projects/new', 'ProjectController@showCreateForm')->name('newproject')->middleware('auth');
Route::post('/projects/new', 'ProjectController@create');

Route::get('/projects/{id}', 'ProjectController@display')->name('display');
Route::post('/projects/{id}/donate', 'DonationController@donate')->middleware('auth');
Route::get('/projects/{id}/donate', function($id) { return redirect()->route('display', ['id'=>$id]); });

// Auth
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');
