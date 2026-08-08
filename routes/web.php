<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\DataOwnerController;
use App\Http\Controllers\DataGovernanceController;
use App\Http\Controllers\KebijakanPrivasiController;
use App\Http\Controllers\KatalogDatasetController;

/*
|--------------------------------------------------------------------------
| Public Routes (tanpa auth)
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/organisasi', [OrganisasiController::class, 'index'])->name('organisasi');
Route::get('/data-owner', [DataOwnerController::class, 'index'])->name('data-owner');
Route::get('/data-owner/{slug}', [DataOwnerController::class, 'show'])->name('data-owner.show');
Route::get('/data-governance', [DataGovernanceController::class, 'index'])->name('data-governance');
Route::get('/katalog-dataset', [KatalogDatasetController::class, 'index'])->name('katalog-dataset');
Route::get('/katalog-dataset/{slug}', [KatalogDatasetController::class, 'show'])->name('dataset.show');
Route::get('/kebijakan-privasi', [KebijakanPrivasiController::class, 'index'])->name('kebijakan-privasi');

// Stub routes — akan diimplementasi di iterasi berikutnya
Route::get('/tentang', function () {
    return redirect('/');
})->name('tentang');

Route::get('/profil', function () {
    return redirect('/');
})->name('profil');

Route::get('/berita', function () {
    return redirect('/');
})->name('berita');

Route::get('/berita/{slug}', function ($slug) {
    return redirect('/');
})->name('news.show');