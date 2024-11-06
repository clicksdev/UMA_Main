<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Session;


Route::get('/', [HomeController::class, 'index']);

Route::get('/course/{id}', [HomeController::class, 'courseDetails']);
Route::get('/president-word', [HomeController::class, 'presidentIndex']);
Route::get('/course/apply/{id}', [HomeController::class, 'courseApplyIndex']);
Route::post('/course/apply', [HomeController::class, 'applyCourse'])->name('course.apply');

Route::get('/major/{id}', [HomeController::class, 'majorDetails']);
Route::get('/president-word', [HomeController::class, 'presidentIndex']);
Route::get('/major/apply/{id}', [HomeController::class, 'majorApplyIndex']);
Route::post('/major/apply', [HomeController::class, 'applyMajor'])->name('major.apply');
Route::get("/success/{name}", [HomeController::class, "successIndex"])->name("success.view");
Route::get('/contact', function() {
    return view('front.contact');
});
Route::get('/terms-and-conditions', function() {
    return view('front.terms');
});
Route::get('/privacy-policy', function() {
    return view('front.privacy');
});
Route::get('/our-programs', function() {
    return view('front.majors');
});

Route::get('/admins/moveToTop/{id}', [HomeController::class, 'moveToTop']);
Route::get('/admins/moveMajorToTop/{id}', [HomeController::class, 'moveMajorToTop']);


Route::get('/set-language/{lang}', function ($lang) {

    Session::put('applocale', $lang);

    return redirect()->back();

})->name('set.language');
