<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageCustomizationController;
use App\Http\Controllers\PCBannerController;
use App\Http\Controllers\MediaUploadController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*NotificationListController
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
Route::get('/', function () {
    return view('auth.login');
});
Auth::routes(['register' => false]);
Route::group(['middleware' => ['auth', 'dynamic']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('page_customization/banner', [
        PageCustomizationController::class,
        'bannerStore',
    ])->name('page_customization.bannerStore');

    Route::resource(
        'page_customization',
        PageCustomizationController::class
    )->except(['update']);
    Route::post('page_customization/update/{id}', [
        PageCustomizationController::class,
        'update',
    ])->name('page_customization.update');
    Route::post('page_customization/search', [
        PageCustomizationController::class,
        'show',
    ])->name('catSearch');
    Route::get('get-page-data', [
        PageCustomizationController::class,
        'getData',
    ])->name('get-page-data');
    Route::get('get-google-ads', [
        PageCustomizationController::class,
        'goggleAdsData',
    ])->name('get-google-ads');
    Route::post('search-banner', [
        PageCustomizationController::class,
        'showEmployee',
    ])->name('search-banner');
    Route::get('/menu/status', [
        PageCustomizationController::class,
        'headerMenuStatus',
    ])->name('header_menu_status');
    Route::get('add-to-log', [HomeController::class, 'myTestAddToLog'])->name(
        'add-to-log'
    );   
    Route::get('/myProfile', [HomeController::class, 'myProfile'])->name(
        'myProfile'
    );
    Route::any('media_upload/file_upload', [
        MediaUploadController::class,
        'startUpload',
    ])->name('media_file_upload');
    Route::resource('dashboarduser', TeamMemberController::class);
    Route::resource('pc-slider', PCBannerController::class);
});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
