<?php

use App\Http\Livewire\Spp;
use App\Http\Livewire\Guru;
use App\Http\Livewire\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/siswa', Siswa::class)->name('siswa');
Route::get('/guru', Guru::class)->name('guru');
Route::get('/spp', Spp::class)->name('spp');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
