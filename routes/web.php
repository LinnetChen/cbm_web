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
// if (isset($_SERVER['HTTP_CF_CONNECTING_IP']) && ($_SERVER['HTTP_CF_CONNECTING_IP'] == '211.23.144.219')) {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/prereg', function () {
        return view('prereg');
    });

    Route::get('/prereg1', function () {
        return view('prereg1');
    });

    Route::middleware(['setReturnUrl'])->group(function () {
        Route::get('/jointAct', function () {
            return view('event/20240403_jointAct_index');
        });
    });

// }

