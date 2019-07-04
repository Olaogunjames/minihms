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

Route::get('/', function () {
    return view('layouts.master');
});
Route::get('/rooms', function () {
    return view('layouts.master');
});
Route::get('/room/{id}', function () {
    return view('layouts.master');
});
// Route::get('/room/{id}', 'Controller@index');
Route::get('/admin/rooms', function () {
    return view('layouts.master');
});
Route::get('/admin/users', function () {
    return view('layouts.master');
});
Route::get('/admin/reservations', function () {
    return view('layouts.master');
});
Route::get('/admin/confirm-reservation', function () {
    return view('layouts.master');
});
// Route::get('/admin/confirm-reservations-store', 'BookingController@confirmReservationsStore');
Route::get('/admin/dashboard', function () {
    return view('layouts.master');
});
Route::get('/dashboard', function () {
    return view('layouts.master');
});
Route::get('/profile', function () {
    return view('layouts.master');
});
// Route::post('api/admin/rooms/store', 'API\RoomController@storeRoom');

// Route::get('/admin/{vue_capture?}', function () {
//     return view('layouts.master');
// })->where('vue_capture', '[\/\w\.-]*');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
