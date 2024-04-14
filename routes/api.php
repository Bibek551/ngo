<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('blogs', [ApiController::class, 'BlogIndex']);
Route::get('blog/{slug}', [ApiController::class, 'BlogSingle']);

Route::get('actions', [ApiController::class, 'ActionIndex']);
Route::get('action/{slug}', [ApiController::class, 'ActionSingle']);

Route::get('services', [ApiController::class, 'ServiceIndex']);
// Route::get('/service/{slug}', [ApiController::class, 'serviceSingle']);

Route::get('helps', [ApiController::class, 'HelpIndex']);

Route::get('testimonials', [ApiController::class, 'TestimonialIndex']);

Route::get('teams', [ApiController::class, 'TeamIndex']);

Route::get('faqs', [ApiController::class, 'FaqIndex']);

Route::get('sliders', [ApiController::class, 'SliderIndex']);

Route::get('socialmedias', [ApiController::class, 'SocialmediaIndex']);

Route::get('settings', [ApiController::class, 'SettingIndex']);

Route::get('page/{slug}', [ApiController::class, 'pageDetail']);

Route::post('inquiry', [ApiController::class, 'inquiryIndex']);

Route::post('donations', [ApiController::class, 'donationIndex']);

Route::post('volunteers', [ApiController::class, 'volunteerIndex']);