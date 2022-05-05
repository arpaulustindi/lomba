<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Lombas;
use App\Http\Livewire\Pesertas;
use App\Http\Livewire\Juris;
use App\Http\Livewire\Onboard;
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
Route::get('lombas', Lombas::class)->middleware('auth')->name('lomba');
Route::get('pesertas/{idx}', Pesertas::class)->middleware('auth')->name('peserta');
Route::get('juris', Juris::class)->middleware('auth')->name('juri');
Route::get('onboard', Onboard::class)->middleware('auth')->name('onboard');
Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
