<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Cookie;
use App\Livewire\Componenttest;
use App\Livewire\Publicchat;                  
use App\Http\Middleware\CustomCookie;
use App\Livewire\PublicResponse;

/*Route::get('/', function () {
    return view('welcome');
})->name('home'); */

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');



Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});













Route::get('/',Publicchat::class)
->middleware(CustomCookie::class);

Route::get('/chatresponse',PublicResponse::class);


 

   /* Cookie::queue('my_cookie','my_value',60);
  
    return view('livewire.publicchat');
});   */






Route::get('/test', Componenttest::class);



Route::get('/set-cookie',function(){

    $cookie =cookie('my_cookie', 'John Doe', 60);

    return response('Cookie set')->cookie($cookie);

});

Route::get('/get-cookie',function(){

    $userName = request()->cookie('my_cookie');
    return "User Name: $userName";

});





Route::get('/welcome', function () {
    return view('welcome');
});


require __DIR__.'/auth.php';
