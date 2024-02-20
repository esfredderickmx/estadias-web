<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'pages.index')->name('index');
Route::view('/home', 'pages.index')->name('home');

Route::get('/sign-in', \App\Livewire\Authentication\SignIn::class)->name('auth.sign-in')->middleware('guest');
Route::get('/sign-up', \App\Livewire\Authentication\SignUp::class)->name('auth.sign-up')->middleware('guest');
Route::get('/forgot-password', \App\Livewire\Authentication\Password\Forgot::class)->name('password.request')->middleware('guest');
Route::get('/reset-password/{token}', \App\Livewire\Authentication\Password\Reset::class)->name('password.reset')->middleware('guest');

Route::get('/user-requests', \App\Livewire\Management\SignUpRequests\RequestsIndex::class)->name('manage.user-requests')->middleware('auth');
