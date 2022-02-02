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

Route::resource('products', 'App\Http\Controllers\ProductController');
Route::get('/', function ()
    {
        return 'main page';
    });

Route::get('email-test', function(){

    $details['email'] = 'bigashev25@gmail.com';

    dispatch(new App\Jobs\QueueSenderEmail($details));

    dd('done');
});
