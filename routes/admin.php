<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\LoginController;
use App\Http\Controllers\Dashboard\StatisticsController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\TestimonialController;
use App\Http\Controllers\Dashboard\CourseController;
use App\Http\Controllers\Dashboard\ApplicantsController;
use App\Http\Controllers\Dashboard\FaqController;
use App\Http\Controllers\Dashboard\SponsorController;
use App\Http\Controllers\Front\HomeController;

Route::get('login', [LoginController::class, 'getShowAdmin']);
Route::post('login', [LoginController::class, 'postAdminLogin'])->name('admins.login');
Route::get('logout', [LoginController::class, 'adminLogout'])->name('admins.logout');

Route::middleware('AdminAuth')->group(function () {

    Route::view('/', 'backend.index')->name('dashboard.index');

    /*****************  Site Settings ****************/

    Route::resource('settings', SettingsController::class);

    /*****************  Site courses ****************/
    Route::get('courses/dataTable', [CourseController::class, 'dataTable']);
    Route::get('courses/{course}/delete', [CourseController::class, 'destroy'])->name('courses.delete');
    Route::post('courses/store', [CourseController::class, 'store']);
    Route::post('courses/update', [CourseController::class, 'update']);
    Route::resource('courses', CourseController::class);

    /***************** Statistics *****************/
    Route::get('statistics/dataTable', [StatisticsController::class, 'dataTable']);
    Route::get('statistics/{statistic}/delete', [StatisticsController::class, 'destroy'])->name('statistics.delete');
    Route::resource('statistics', StatisticsController::class);

    /***************** Applicants *****************/
    Route::get('applicants/dataTable', [ApplicantsController::class, 'dataTable'])->name('applicants.datatable');
    Route::post('applicants/export', [ApplicantsController::class, 'export'])->name('applicants.export');
    Route::post('applicants/updateRating', [ApplicantsController::class, 'updateRating'])->name('applicants.updateRating');
    Route::get('applicants/{applicant}/getRating', [ApplicantsController::class, 'getRating'])->name('applicants.getRating');
    Route::get('applicants/user/{id}', [ApplicantsController::class, 'getUserIndex'])->name('applicant.details');
    Route::resource('applicants', ApplicantsController::class);

    // Sponsor
    Route::prefix('sponsors')->group(function () {
        Route::get("/", [SponsorController::class, "index"])->name("admin.sponsors.show");
        Route::get("/get", [SponsorController::class, "get"])->name("admin.sponsors.get");
        Route::get("/create", [SponsorController::class, "add"])->name("admin.sponsors.add");
        Route::post("/create", [SponsorController::class, "create"])->name("admin.sponsors.create");
        Route::get("/edit/{id}", [SponsorController::class, "edit"])->name("admin.sponsors.edit");
        Route::get("/toggleTop/{id}", [SponsorController::class, "toggleTop"])->name("admin.sponsors.toggleTop");
        Route::post("/update", [SponsorController::class, "update"])->name("admin.sponsors.update");
        Route::get("/delete/{id}", [SponsorController::class, "deleteIndex"])->name("admin.sponsors.delete.confirm");
        Route::post("/delete", [SponsorController::class, "delete"])->name("admin.sponsors.delete");
    });

    /***************** Testimonials *****************/
    Route::get('testimonials/dataTable', [TestimonialController::class, 'dataTable']);
    Route::get('testimonials/{testimonial}/delete', [TestimonialController::class, 'destroy'])->name('testimonials.delete');
    Route::resource('testimonials', TestimonialController::class);

    /***************** FAQS *****************/
    Route::get('faqs/dataTable', [FaqController::class, 'dataTable']);
    Route::get('faqs/{faq}/delete', [FaqController::class, 'destroy'])->name('faqs.delete');
    Route::resource('faqs', FaqController::class);

    /***************** Admins *****************/

    Route::get('/admins/dataTable', [AdminController::class, 'datatable'])->name('admins.datatable');
    Route::get('admins/{admin}/delete', [AdminController::class, 'destroy'])->name('admins.delete');
    Route::resource('admins', AdminController::class);

});

