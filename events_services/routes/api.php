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

Route::get('/hall_listing_guest', 'UserController@hall_listing_guest');
Route::get('/hall_listing_section_guest/{id}', 'UserController@hall_listing_section_guest');
Route::get('/hall_listing_section_details_guest/{id}', 'UserController@hall_listing_section_details_guest');
Route::get('/hall_theme_guest/{id}', 'UserController@hall_theme_guest');
Route::get('/hall_theme_detail_guest/{id}', 'UserController@hall_theme_detail_guest');
Route::get('/hall_services_guest/{id}', 'UserController@hall_services_guest');
Route::get('/hall_services_detail_guest/{id}', 'UserController@hall_services_detail_guest');
Route::post('/search_filter', 'UserController@search_filter');
Route::post('/search_filter_section', 'UserController@search_filter_section');
Route::get('/vendor_service_type', 'UserController@vendor_service_type');
Route::get('/vendor_service/{id}', 'UserController@vendor_service');
Route::get('/vendor_service_detail/{id}', 'UserController@vendor_service_detail');
Route::get('/rating_detail/{id}', 'UserController@rating_detail');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
Route::group(['middleware' => 'cors', 'prefix' => '/v1'], function () {
    Route::post('/login', 'UserController@authenticate');
    Route::post('/register', 'UserController@register');
    Route::get('/logout/{api_token}', 'UserController@logout');
    Route::post('/user_profile_update/{id}', 'UserController@user_profile_update');
    Route::get('/user_profile/{id}', 'UserController@user_profile');
    Route::get('/user_booking_history/{id}', 'UserController@user_booking_history');
    Route::post('/hall_booking_guest/{id}', 'UserController@hall_booking_guest');
    Route::post('/hall_booking_serivce_guest', 'UserController@hall_booking_serivce_guest');
    Route::post('/rating_halls', 'UserController@rating_halls');
    Route::get('/check_rating/{id}', 'UserController@check_rating');

    Route::post('/vendor_service_booking', 'UserController@vendor_service_booking');
});