<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('LandingPage.index');
})->middleware('guest');

Route::get('/customer-signup', function () {
    return view('LandingPage.customer-signup');
});
Route::get('/service-provider-signup', function () {
    return view('LandingPage.service-provider-signup');
});

Route::controller(App\Http\Controllers\User\UserController::class)->group(function(){

    Route::post('/add-customer','addCustomer');
    Route::post('/add-service-provider','addServiceProvider');
    Route::post('/login','login');
    Route::get('/logout','logout')->middleware('auth');

});


Route::controller(App\Http\Controllers\User\UserController::class)->middleware(['auth','isCustomer'])->group(function() {

    Route::get('/user_dashboard','UserDashboard');
    Route::get('/user_services', 'UserServices');
    Route::get('/user_service_providers', 'UserServiceProviders');
    Route::get('/user_appointments', 'UserAppointments');
    Route::get('/user_profile', 'UserProfile');

});


Route::controller(App\Http\Controllers\User\UserController::class)->middleware(['auth','isServiceProvider'])->group(function() {
    
    Route::get('/service_provider_dashboard', 'ProviderDashboard');
    Route::get('/service_provider_services', 'ProviderServices');
    Route::get('/service_provider_appointments', 'ProviderAppointments');
    Route::get('/service_provider_profile', 'ProviderProfile');
    
});


Route::controller(App\Http\Controllers\User\UserController::class)->middleware(['auth','isAdmin'])->group(function() {
    
    Route::get('/admin_dashboard', 'AdminDashboard');
    Route::get('/admin_service_providers', 'AdminServiceProvider');
    Route::get('/admin_customers', 'AdminCustomer');
    Route::get('/admin_profile', 'AdminProfile');

});





