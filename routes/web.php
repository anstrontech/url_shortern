<?php
use Illuminate\Support\Facades\Route;
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

Route::get('/', 'ShortLinkController@index');
Route::get('/login', 'ShortLinkController@index');
Route::get('/register', 'ShortLinkController@registerview');
Route::get('/userprofile', 'ShortLinkController@profileview');
Route::get('generate-shorten-link', 'ShortLinkController@index');
Route::post('generate-shorten-link', 'ShortLinkController@store')->name('generate.shorten.link.post');
Route::get('{code}', 'ShortLinkController@shortenLink')->name('shorten.link');

Route::post('/register','ShortLinkController@register');
Route::post('/login','ShortLinkController@auth');
Route::post('/logout','ShortLinkController@logout');
Route::post('/userprofile','ShortLinkController@userprofileupdate');