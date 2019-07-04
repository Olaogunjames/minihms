<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();   
});


Route::apiResources([
    'rooms' => 'API\RoomController',        
    'roomsclient' => 'API\RoomControllerClient', 
    'booking' => 'API\BookingController',
]);

Route::post('reserve/pay', 'API\PayController@reserve');
Route::get('roomshome', 'API\RoomControllerClient@home');
Route::get('users', 'API\RoomController@users');
Route::get('profile', 'API\RoomController@profile');
Route::post('updateuser/{id}', 'API\RoomController@updateuser');
Route::get('cusers', 'API\RoomController@cusers');
Route::get('crooms', 'API\RoomController@crooms');
Route::get('cbrooms', 'API\BookingController@cbrooms');
Route::delete('deleteuser/{id}', 'API\RoomController@deleteuser');
Route::get('reservations', 'API\BookingController@reservations');
Route::get('userreservations', 'API\BookingController@userreservations');
Route::get('cuserreservations', 'API\BookingController@cuserreservations');
Route::get('confirm-reservations', 'API\BookingController@confirmReservations');
Route::post('confirm-reservations-store/{id}', 'API\BookingController@confirmReservationsStore');

