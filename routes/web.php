<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;


Route::get('/', [HomeController::class, 'index']);

Route::get('/course/{id}', [HomeController::class, 'courseDetails']);
Route::get('/president-word', [HomeController::class, 'presidentIndex']);
Route::get('/course/apply/{id}', [HomeController::class, 'courseApplyIndex']);
Route::post('/course/apply', [HomeController::class, 'applyCourse'])->name('course.apply');
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
