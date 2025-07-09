<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use App\Livewire\Componenttest;
use App\Livewire\Publicchat;
use App\Http\Middleware\CustomCookie;
use App\Livewire\PublicResponse;




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
