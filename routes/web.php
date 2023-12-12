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


Route::middleware(['auth','isCustomer'])->name('customer')->group(function() {

    Route::controller(App\Http\Controllers\User\UserController::class)->group(function(){
        Route::get('/user_dashboard','UserDashboard');
        Route::get('/user_services', 'UserServices');
        Route::get('/user_service_providers', 'UserServiceProviders');
        Route::get('/user_appointments', 'UserAppointments');
        Route::get('/user_profile', 'UserProfile');

         //edit Profile
        Route::post('/edit_cu_profile', 'cuEditProfile');
        //change profile puc
        Route::post('/change_cu_profile_pic', 'cuChangeProfilePic');
        //view service provider profile
        Route::get('/service_provider_profile/{service_provider_id}', 'viewServiceProvider');
        //rate Service
        Route::get('/rate_service/{service_id}', 'rateService');
        //change password
        Route::post('/cu_change_password', 'cuChangePassword');

    })->middleware('auth');

    Route::controller(App\Http\Controllers\User\AppointmentController::class)->group(function(){
        Route::get('/set_appointment/{service_id}','setAppointment');
        Route::post('/add_appointment','storeAppointment')->name('appointment.store');
        
    })->middleware('auth');

    Route::controller(App\Http\Controllers\User\ServiceController::class)->group(function(){
        
        //rate Service
        Route::post('/rate_service/{service_id}', 'rateService');

    })->middleware('auth');
});


Route::middleware(['auth','isServiceProvider'])->name('service_provider')->group(function() {
    
    Route::controller(App\Http\Controllers\User\UserController::class)->group(function() {
        Route::get('/service_provider_dashboard', 'ProviderDashboard');
        Route::get('/service_provider_services', 'ProviderServices');
        Route::get('/service_provider_appointments', 'ProviderAppointments');
        Route::get('/service_provider_profile', 'ProviderProfile');
        Route::get('/service_provider_top_services', 'serviceProviderTopServices');

        //edit Profile
        Route::post('/edit_sp_profile', 'spEditProfile');
        //change profile puc
        Route::post('/change_sp_profile_pic', 'spChangeProfilePic');
        //change password
        Route::post('/sp_change_password', 'spChangePassword');
    });

    Route::controller(App\Http\Controllers\User\ServiceController::class)->group(function() {
       Route::post('/addService','create');

       //view service details
       Route::get('/view_service_details/{id}', 'view');
    });

    Route::controller(App\Http\Controllers\User\AppointmentController::class)->group(function() {
        Route::get('/view_appointment_calendar','viewAppointmentCalendar');

     });

     Route::controller(App\Http\Controllers\User\VerificationController::class)->group(function() {
        Route::put('/submitVerificationRequest','addVerificationRequest');
     });
   
    
});


Route::controller(App\Http\Controllers\User\UserController::class)->middleware(['auth','isAdmin'])->name('admin')->group(function() {
    
    Route::get('/admin_dashboard', 'AdminDashboard');
    Route::get('/admin_service_providers', 'AdminServiceProvider');
    Route::get('/admin_customers', 'AdminCustomer');
    Route::get('/admin_profile', 'AdminProfile');
    Route::get('/admin_top_services', 'adminTopServices');

    //edit Profile
    Route::post('/edit_ad_profile', 'adEditProfile');
    //change profile puc
    Route::post('/change_ad_profile_pic', 'adChangeProfilePic');
    //change password
    Route::post('/ad_change_password', 'adChangePassword');

});





