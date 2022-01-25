<?php

use Illuminate\Support\Facades\Route;
use App\Helpers\Feed;
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
/*Feed in app-Helper-Feed */
Route::get('/', function () {
    $data = Feed::test();
    return view('test',[
        'itemsCoin' => $data
    ]);
});
