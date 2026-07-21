<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganisasiController;

/*
|--------------------------------------------------------------------------
| Public Routes (tanpa auth)
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/organisasi', [OrganisasiController::class, 'index'])->name('organisasi');

// Stub routes — akan diimplementasi di iterasi berikutnya
Route::get('/tentang', function () {
    return redirect('/');
})->name('tentang');

Route::get('/profil', function () {
    return redirect('/');
})->name('profil');

Route::get('/data-owner', function () {
    return redirect('/');
})->name('data-owner');

Route::get('/data-governance', function () {
    return redirect('/');
})->name('data-governance');

Route::get('/katalog-dataset', function () {
    return redirect('/');
})->name('katalog-dataset');

Route::get('/katalog-dataset/{slug}', function ($slug) {
    return redirect('/');
})->name('dataset.show');

Route::get('/berita', function () {
    return redirect('/');
})->name('berita');

Route::get('/berita/{slug}', function ($slug) {
    return redirect('/');
})->name('news.show');
