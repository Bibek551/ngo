<?php

use App\Http\Controllers\Admin\AchievementController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DemandController;
use App\Http\Controllers\Admin\DonationController;
use App\Http\Controllers\Admin\VolunteerController;
use App\Http\Controllers\Admin\DownloadController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\BookingFormController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\OurteamController;

use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SocialmediaController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UniversityController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

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
Auth::routes();
// Auth::routes(['register' => false]);

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


//CMS routes
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    // Route::resource('countries', CountryController::class);
    // Route::resource('courses', CourseController::class);
    // Route::resource('demands', DemandController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('services', ServiceController::class);
    // Route::resource('partners', PartnerController::class);
    Route::resource('sliders', SliderController::class);
    // Route::resource('branches', BranchController::class);
    // Route::resource('universities', UniversityController::class);
    // Route::resource('features', FeatureController::class);

    Route::resource('ourteams', OurteamController::class);
    // Route::resource('faqs', FaqController::class);
    // Route::resource('downloads', DownloadController::class);
    Route::resource('users', UserController::class);
    // Route::resource('achievements', AchievementController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('pages', PageController::class);
    Route::resource('socialmedias', SocialmediaController::class);
    Route::get('inquirypersons', [InquiryController::class, 'index'])->name('inquirypersons.index');
    Route::delete('inquirypersons/{inquiryperson}', [InquiryController::class, 'destroy'])->name('inquiries.destroy');
    
    Route::get('donations', [DonationController::class, 'index'])->name('donations.index');
    Route::delete('donations/{donation}', [DonationController::class, 'destroy'])->name('donations.destroy');
    
    Route::get('volunteers', [VolunteerController::class, 'index'])->name('volunteers.index');
    Route::delete('volunteers/{volunteer}', [VolunteerController::class, 'destroy'])->name('volunteers.destroy');
    

    Route::get('change-password', [AuthController::class, 'index'])->name('profile');
    Route::post('change-password', [AuthController::class, 'store'])->name('change.password');

    Route::get('settings', [SettingController::class, 'edit'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');

    Route::resource('galleries', GalleryController::class);
    Route::get('/gallery/delete-file/{id}', [GalleryController::class, 'documentDelete'])->name('document.delete');

});