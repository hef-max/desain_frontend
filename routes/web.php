<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;



// Login first page
Route::get('/', [Controller::class, 'index'])->name('index');
// check login username dan password
Route::get('/login_view', [Controller::class, 'login_view'])->name('login');




Route::post('/login', [Controller::class, 'login'])->name('login');

// url jika diinputkan di web browser /login maka akan diblock oleh system 
Route::get('/login', function() { 
    return redirect('/login_view');
    }
);



//register
Route::post('/register', [Controller::class, 'register_auth'])->name('register');



Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');


// logout
Route::get('/logout', [Controller::class, 'logout'])->name('logout');