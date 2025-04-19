<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;

// Dil Değiştirme (GET)
Route::get('/dil-degistir/{lang}', [LanguageController::class, 'switch'])
    ->name('language.switch');

// Dil Bazlı Route'lar
Route::prefix('{lang}')
    ->where(['lang' => 'tr|en|ru'])
    ->group(function () {
        Route::get('/', function ($lang) {
            return view("frontend.{$lang}.index"); // Artık $cssPath ve $jsPath view composer'dan geliyor
        })->name('localized.index');
    });

// Varsayılan yönlendirme
Route::redirect('/', '/tr');