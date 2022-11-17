<?php


use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\FrontendFaqController;
use App\Http\Controllers\Frontend\FrontendAboutController;
use App\Http\Controllers\Frontend\FrontendContactController;
use App\Http\Controllers\Frontend\FrontendHomeController;
use App\Http\Controllers\Frontend\FrontendQuickLinkController;
use App\Http\Controllers\Frontend\FrontendShopController;
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

Auth::routes(['verify' => true]);
/**
 * Frontend route start
 */
Route::middleware('xssSanitizer')->as('frontend.')->group(function () {
    /**
     * Guest route with web guard start
     */
    Route::get('/',[FrontendHomeController::class,'index'])->name('home');

    Route::get('/about',[FrontendAboutController::class,'index'])->name('about');

    Route::get('/contact',[FrontendContactController::class,'index'])->name('contact');
    Route::post('/contact/store', [FrontendContactController::class, 'store'])->name('contact.store');

    Route::get('/faq',[FrontendFaqController::class,'index'])->name('faq');

    Route::get('/shop',[FrontendShopController::class,'index'])->name('shop');
    Route::get('/shop/product-details',[FrontendShopController::class,'singleProduct'])->name('singleProduct');

    Route::post('/subscribe/store', [App\Http\Controllers\Frontend\FrontendSubscribeController::class, 'store'])->name('subscribe.store');

    Route::get('/quick-link/{slug}', [FrontendQuickLinkController::class, 'index'])->name('quickLink');




    /**
     * Guest route with web guard end
     */

    /**
     * Authenticate with web guard start
     */
    Route::middleware(['auth:web','checkStatus'])->prefix('user')->as('user.')->group(function () {
        //frontend home route
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('dashboard');

            Route::post('/profile-update','updateProfile')->name('profileUpdate');
            Route::post('/store-shipping-address','storeShippingAddress')->name('storeShippingAddress');
            Route::post('/update-shipping-address/{id}','updateShippingAddress')->name('updateShippingAddress');
            Route::post('/store-billing-address','storeBillingAddress')->name('storeBillingAddress');
            Route::post('/update-billing-address/{id}','updateBillingAddress')->name('updateBillingAddress');
            Route::get('/view/ticket/{id}', 'viewTicket')->name('viewTicket');
            Route::post('ticket/reply/store', 'ticketReply')->name('ticketReply');
            Route::get('/show/reply/{id}', 'showReply')->name('showReply');
            Route::post('/ticket/store', 'store')->name('ticket.store');
        });
    });
    /**
     * Authenticate with web guard end
     */
});
/**
 * Fronend route end
 */



