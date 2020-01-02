<?php

Route::get('/', 'HomeController@awal')->name('awal');
Route::get('/services', 'HomeController@services')->name('services');
Route::get('/aboutus', 'HomeController@aboutus')->name('aboutus');
Route::get('/blog', 'HomeController@blog')->name('blog');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/booking', 'HomeController@booking')->name('booking');
Route::get('/booking-history', 'HomeController@history')->name('history');
Route::get('/ashley-login', 'HomeController@ashley_login')->name('ashley.login');
Route::get('/ashley-register', 'HomeController@ashley_register')->name('ashley.register');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin',  'middleware' => 'admin'], function(){
    Route::get('/', function () {
        return view('admin.dashboard');
    });
    Route::resource('booking', 'Admin\BookingController');
    Route::resource('booking-detail', 'Admin\BookingDetailController');
    Route::resource('waktu-hari', 'Admin\WaktuHariController');
    Route::resource('terapis-perawatan', 'Admin\TerapisPerawatanController');
    Route::resource('terapis', 'Admin\TerapisController');
    Route::resource('perawatan', 'Admin\PerawatanController');
    Route::resource('perawatan-kategori', 'Admin\PerawatanKategoriController');
    Route::resource('jadwal-terapis', 'Admin\JadwalTerapisController');
    Route::resource('hari-libur', 'Admin\HariLiburController');
});

Route::post('booking', 'Admin\BookingController@booking');

Route::post('booking-admin', 'Admin\BookingController@booking_admin');
Route::get('booking-customer-data', 'Admin\BookingController@customer_data');
Route::get('booking-jadwal-terapis', 'Admin\BookingController@booking_jadwal_terapis');
Route::get('data-terapis', 'Admin\BookingController@dataterapis');

Route::get('booking-finish', 'Admin\BookingController@booking_finish')->name('booking.finish');
Route::get('booking-cancel', 'Admin\BookingController@booking_cancel')->name('booking.cancel');

Route::get('datatables', 'DataTablesController@index')->name('datatables');
