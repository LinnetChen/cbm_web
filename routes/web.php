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

Route::get('/prereg', function () {
    return view('prereg');
});
Route::middleware(['setReturnUrl'])->group(function () {
    Route::get('/jointAct', function () {
        return view('event/20240403_jointAct_index');
    });
});

Route::get('/prereg1', function () {
    return view('prereg1');
});
Route::get('/', 'homepage\FrontController@index');

Route::get('/index', 'homepage\FrontController@index')->name('index');

Route::get('/newlist/{cate?}', 'homepage\FrontController@news_list')->name('news_list');

Route::get('/news_content/{id?}', 'homepage\FrontController@news_content')->name('news_content');

Route::get('/video', 'homepage\FrontController@video')->name('video');
if (isset($_SERVER['HTTP_CF_CONNECTING_IP']) && ($_SERVER['HTTP_CF_CONNECTING_IP'] == '211.23.144.219')) {
    Route::get('/game_religion', function () {
        return view('homepage/game_religion');
    });
    Route::get('/war', 'homepage\FrontController@war')->name('war');
}

Route::get('/gameMall', function () {
    return view('gameMall_index');
});
Route::get('/purchaseSuccess', function () {
    return view('purchaseSuccess');
});

Route::get('/purchaseFailed', function () {
    return view('purchaseFailed');
});


