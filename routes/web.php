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
    return view('welcome');
});

Auth::routes();

Route::get('/home', function(){
    return redirect('/');
});


//    ******************************website***************************************************

Route::get('/', 'WebsiteController@index_page');
Route::get('venue', 'WebsiteController@venue_page');
Route::get('floral', 'WebsiteController@floral');
Route::get('card', 'WebsiteController@card');
Route::get('header', 'WebsiteController@header_page');
Route::get('gallery', 'WebsiteController@gallery_page');
Route::get('catering', 'WebsiteController@catering');
Route::get('photography', 'WebsiteController@photography');
Route::get('photography_detail', 'WebsiteController@photography_detail');
Route::get('contact', 'WebsiteController@contact_page');
Route::get('single-venue', 'WebsiteController@listing_page');
Route::get('about', 'WebsiteController@about_page');
Route::get('services', 'WebsiteController@service_page');
Route::get('transport', 'WebsiteController@transport');
Route::get('styling', 'WebsiteController@styling');
Route::get('styling_detail', 'WebsiteController@styling_detail');
Route::get('decoration_detail', 'WebsiteController@decoration_detail');
Route::get('decoration', 'WebsiteController@decoration');
Route::get('transport_detail', 'WebsiteController@transport_detail');
Route::get('theme_detail/{id}', 'WebsiteController@theme_detail');
Route::get('venue_detail/{id}', 'WebsiteController@venue_detail');
Route::get('catering_detail/{id}', 'WebsiteController@catering_detail');
Route::post('/section_details', 'WebsiteController@section_details');
Route::post('/section_click_where_details', 'WebsiteController@section_click_where_details');


//    ******************************website***************************************************

Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard','AdminController@index');

    Route::get('/search_filter','AdminController@search_filter');
    Route::post('/search_filter_data','AdminController@search_filter_data');

//    ******************************admin routes***************************************************
    //admin
    Route::get('/admin_detail', 'AdminController@admin_detail');
    Route::get('/admin_hall/{id}', 'AdminController@admin_hall');

    //agent
    Route::get('/agents', 'AdminController@agents_detail');
    Route::get('/add_agent', 'AdminController@add_agent');
    Route::post('/add_agent_store', 'AdminController@add_agent_store');
    Route::get('/agent_hall_detail/{id}', 'AdminController@agent_hall_detail');
    Route::get('/agent_edit/{id}', 'AdminController@agent_edit');
    Route::post('/agent_update', 'AdminController@agent_update');
    Route::get('/agent_delete/{id}', 'AdminController@agent_delete');

    //user
    Route::get('/users', 'AdminController@users_detail');
    Route::get('/add_users', 'AdminController@add_users');
    Route::post('/add_users_store', 'AdminController@add_users_store');
    Route::get('/user_edit/{id}', 'AdminController@user_edit');
    Route::post('/user_update', 'AdminController@user_update');
    Route::get('/user_delete/{id}', 'AdminController@user_delete');

    //hall approved
    Route::get('/approved_hall_table', 'AdminController@approved_hall_table');
    Route::get('/add_hall', 'AdminController@add_hall');
    Route::get('/approved_hall_status/{id}/{string}', 'AdminController@approved_hall_status');
    Route::post('/add_hall_store', 'AdminController@add_hall_store');
    Route::get('/hall_a_delete/{id}', 'AdminController@hall_a_delete');


    //vendor service
        //vendor service type
    Route::get('/vendor_service_type', 'AdminController@vendor_service_type');
    Route::get('/vendor_service_type_add', 'AdminController@vendor_service_type_add');
    Route::post('/vendor_service_type_add_store', 'AdminController@vendor_service_type_add_store');
    Route::get('/vendor_service_type_edit/{id}', 'AdminController@vendor_service_type_edit');
    Route::post('/vendor_service_type_update', 'AdminController@vendor_service_type_update');
    Route::get('/vendor_service_type_image_delete/{id}', 'AdminController@vendor_service_type_image_delete');
    Route::get('/vendor_service_type_delete/{id}', 'AdminController@vendor_service_type_delete');

        //vendor services
    Route::get('/vendor_service/{id}', 'AdminController@vendor_service');
    Route::get('/vendor_service_add/{id}', 'AdminController@vendor_service_add');
    Route::post('/vendor_service_add_store', 'AdminController@vendor_service_add_store');
    Route::get('/vendor_service_edit/{id}', 'AdminController@vendor_service_edit');
    Route::post('/vendor_service_update', 'AdminController@vendor_service_update');
    Route::get('/vendor_service_delete/{id}', 'AdminController@vendor_service_delete');

        //vendor catering
    Route::get('/vendor_catering_detail/{id}', 'AdminController@vendor_catering_detail');
    Route::get('/vendor_add_catering', 'AdminController@vendor_add_catering');

        // vendor catering deals
    Route::get('/vendor_catering_deals/{id}', 'AdminController@vendor_catering_deal');
    Route::get('/vendor_catering_deal_add/{id}', 'AdminController@vendor_catering_deal_add');
    Route::post('/vendor_catering_deal_store', 'AdminController@vendor_catering_deal_store');
    Route::get('/vendor_catering_deal_edit/{id}/{string}', 'AdminController@vendor_catering_deal_edit');
    Route::post('/vendor_catering_deal_update', 'AdminController@vendor_catering_deal_update');
    Route::get('/vendor_catering_deal_delete/{id}', 'AdminController@vendor_catering_deal_delete');

        //vendor catering menus
    Route::get('/vendor_catering_menus/{id}', 'AdminController@vendor_catering_menus');
    Route::get('/vendor_catering_menus_add/{id}', 'AdminController@vendor_catering_menus_add');
    Route::post('/vendor_catering_menus_store', 'AdminController@vendor_catering_menus_store');
    Route::get('/vendor_catering_menus_edit/{id}/{string}', 'AdminController@vendor_catering_menus_edit');
    Route::post('/vendor_catering_menus_update', 'AdminController@vendor_catering_menus_update');
    Route::get('/vendor_catering_menus_delete/{id}', 'AdminController@vendor_catering_menus_delete');

        //vendor catering items
    Route::get('/vendor_catering_items/{id}', 'AdminController@vendor_catering_items');
    Route::get('/vendor_catering_items_add/{id}', 'AdminController@vendor_catering_items_add');
    Route::post('/vendor_catering_items_store', 'AdminController@vendor_catering_items_store');
    Route::get('/vendor_catering_items_edit/{id}/{string}', 'AdminController@vendor_catering_items_edit');
    Route::post('/vendor_catering_items_update', 'AdminController@vendor_catering_items_update');
    Route::get('/vendor_catering_items_delete/{id}', 'AdminController@vendor_catering_items_delete');

    //vendor photography service
    Route::get('/vendor_photography/{id}', 'AdminController@vendor_photography');
    Route::get('/vendor_photography_detail/{id}', 'AdminController@vendor_photography_detail');
    Route::get('/vendor_photography_add/{id}', 'AdminController@vendor_photography_add');
    Route::post('/vendor_photography_store', 'AdminController@vendor_photography_store');
    Route::get('/vendor_photography_edit/{id}', 'AdminController@vendor_photography_edit');
    Route::post('/vendor_photography_update', 'AdminController@vendor_photography_update');
    Route::get('/section_photography_profile_image_delete/{id}', 'AdminController@section_photography_profile_image_delete');
    Route::get('/section_photography_cover_image_delete/{id}', 'AdminController@section_photography_cover_image_delete');





//    hall request
    Route::get('/hall_request_edit/{id}', 'AdminController@hall_request_edit');
    Route::post('/hall_request_edit_store', 'AdminController@hall_request_edit_store');
    Route::get('/hall_request_delete/{id}', 'AdminController@hall_request_delete');

    //service
    Route::get('/add_hall_service', 'AdminController@add_hall_service');
    Route::post('/add_hall_service_store', 'AdminController@add_hall_service_store');
    Route::get('/service_edit/{id}', 'AdminController@service_edit');
    Route::post('/service_update', 'AdminController@service_update');
    Route::get('/hall_service_delete/{id}', 'AdminController@hall_service_delete');
    Route::get('/service_image_delete/{id}', 'AdminController@service_image_delete');
    Route::get('/hall_service_details/{id}', 'AdminController@hall_service_details');

    //theme
    Route::get('/add_hall_theme', 'AdminController@add_hall_theme');
    Route::post('/add_hall_theme_store', 'AdminController@add_hall_theme_store');
    Route::get('/theme_edit/{id}', 'AdminController@theme_edit');
    Route::post('/theme_update', 'AdminController@theme_update');
    Route::get('/hall_theme_delete/{id}', 'AdminController@hall_theme_delete');
    Route::get('/theme_image_delete/{id}', 'AdminController@theme_image_delete');
    Route::get('/hall_theme_details/{id}', 'AdminController@hall_theme_details');

    //booking request
    Route::get('/booking_request', 'AdminController@booking_request');
    Route::get('/booking_request_edit/{id}', 'AdminController@booking_request_edit');
    Route::post('/booking_request_edit_store/{id}', 'AdminController@booking_request_edit_store');
    Route::get('/booking_request_delete/{id}', 'AdminController@booking_request_delete');

    //booking approved
    Route::get('/booking_approved', 'AdminController@booking_approved');
    Route::get('/booking_status/{id}/{string}', 'AdminController@booking_status');
    Route::get('/add_booking_a', 'AdminController@add_booking');
    Route::post('/add_booking_a_store', 'AdminController@add_booking_store');
    Route::get('/booking_edit_a/{id}', 'AdminController@booking_edit');
    Route::post('/booking_update_a/{id}', 'AdminController@booking_update');
    Route::get('/booking_delete_a/{id}', 'AdminController@booking_delete');
    Route::post('/selectAjax', 'AdminController@selectAjax');

    //section
    Route::get('/hall_section_edit_get/{id}', 'AdminController@hall_section_edit_get');
    Route::post('/hall_section_update', 'AdminController@hall_section_update');
    Route::get('/hall_table', 'AdminController@hall_table');
    Route::get('/hall_section_details/{id}', 'AdminController@hall_section_details');
    Route::get('/hall_info/{id}', 'AdminController@hall_details_wd_section');
    Route::post('/hall_update', 'AdminController@hall_update');
    Route::get('/hall_edit/{id}', 'AdminController@hall_edit');
    Route::get('/add_hall_section', 'AdminController@add_hall_section');
    Route::post('/add_hall_section_store', 'AdminController@add_hall_section_store');
    Route::get('/hall_section_delete/{id}', 'AdminController@hall_section_delete');
    Route::get('/section_image_delete/{id}', 'AdminController@section_image_delete');

//    ******************************admin routes***************************************************

//    ******************************agent routes***************************************************


    //hall
    Route::get('/agent_hall', 'AgentController@hall_table');
    Route::get('/agent_add_hall', 'AgentController@add_hall');
    Route::post('/agent_add_hall_store', 'AgentController@add_hall_store');
    Route::get('/agent_hall_edit/{id}', 'AgentController@hall_edit');
    Route::post('/agent_hall_update', 'AgentController@hall_update');
    Route::get('/hall_delete/{id}', 'AgentController@hall_delete');
    Route::get('/hall_image_delete/{id}', 'AgentController@hall_image_delete');

    //section
    Route::get('/agent_add_hall_section', 'AgentController@add_hall_section');
    Route::post('/agent_add_hall_section_store', 'AgentController@add_hall_section_store');
    Route::get('/agent_hall_info/{id}', 'AgentController@hall_details_wd_section');
    Route::get('/agent_hall_section_details/{id}', 'AgentController@hall_section_details');
    Route::get('/agent_hall_section_edit_get/{id}', 'AgentController@hall_section_edit_get');
    Route::post('/agent_hall_section_update', 'AgentController@hall_section_update');
    Route::get('/hall_section_image_delete/{id}/{string}', 'AgentController@hall_section_image_delete');
    Route::get('/agent_hall_section_delete/{id}/{string}', 'AgentController@hall_section_delete');

    //service
    Route::get('/agent_add_hall_service', 'AgentController@add_hall_service');
    Route::post('/agent_add_hall_service_store', 'AgentController@add_hall_service_store');
    Route::get('/agent_hall_service_edit_get/{id}', 'AgentController@hall_service_edit_get');
    Route::post('/agent_hall_service_update', 'AgentController@hall_service_update');
    Route::get('/hall_service_image_delete/{id}/{string}', 'AgentController@hall_service_image_delete');
    Route::get('/agent_hall_service_delete/{id}/{string}', 'AgentController@hall_service_delete');
    Route::get('/agent_hall_service_details/{id}', 'AgentController@hall_service_details');



    //theme
    Route::get('/agent_add_hall_theme', 'AgentController@add_hall_theme');
    Route::post('/agent_add_hall_theme_store', 'AgentController@add_hall_theme_store');
    Route::get('/agent_hall_theme_edit_get/{id}', 'AgentController@hall_theme_edit_get');
    Route::post('/agent_hall_theme_update', 'AgentController@hall_theme_update');
    Route::get('/hall_theme_image_delete/{id}/{string}', 'AgentController@hall_theme_image_delete');
    Route::get('/agent_hall_theme_delete/{id}/{string}', 'AgentController@hall_theme_delete');
    Route::get('/agent_hall_theme_details/{id}', 'AgentController@hall_theme_details');



    //booking
    Route::get('/booking', 'AgentController@booking');
    Route::get('/add_booking', 'AgentController@add_booking');
    Route::post('/add_booking_store', 'AgentController@add_booking_store');
    Route::get('/booking_edit/{id}', 'AgentController@booking_edit');
    Route::post('/booking_update/{id}', 'AgentController@booking_update');
    Route::get('/booking_delete/{id}', 'AgentController@booking_delete');
    Route::post('/selectAjax', 'AgentController@selectAjax');


//    ******************************agent routes***************************************************



});
