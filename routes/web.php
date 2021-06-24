<?php

use App\Http\Controllers\ComicController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'ComicController@index')->name('comics.index');

Route::get('/comics/create', 'ComicController@create')->name('comics.create');

Route::post('/comics', 'ComicController@store')->name('comics.store');

Route::get('/comics/{comic}', 'ComicController@show')->name('comics.show');