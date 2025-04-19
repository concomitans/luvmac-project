<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{

public function switch($lang)
{
    $allowedLangs = ['tr', 'en', 'ru'];
    
    if (!in_array($lang, $allowedLangs)) {
        return back()->with('error', 'Geçersiz dil seçeneği');
    }

    session(['locale' => $lang]);
    return redirect()->route('localized.index', $lang); // View composer otomatik değişkenleri ekleyecek
}
}