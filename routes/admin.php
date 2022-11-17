<?php
use App\Http\Controllers\Admin\AdminBrandController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminChildCategoryController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminCouponController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminHeroProductController;
use App\Http\Controllers\Admin\AdminProductAttributeController;
use App\Http\Controllers\Admin\AdminProductSpecificationController;
use App\Http\Controllers\Admin\AdminQuickLinkController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\Admin\AdminSubCategoryController;
use App\Http\Controllers\Admin\AdminSubscribeController;
use App\Http\Controllers\Admin\AdminTaxController;
use App\Http\Controllers\Admin\AdminTeamController;
use App\Http\Controllers\Admin\AdminUserMassageController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\ConfigSettingsController;
use App\Http\Controllers\Admin\GeneralSettingsController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
/**
 * admin  route start
 */
Route::middleware('xssSanitizer')->prefix('admin')->as('admin.')->group(function () {
    /**
     * guest route with admin guard start
     */
    Route::middleware('guest:admin')->group(function () {
        //login controller
        Route::controller(LoginController::class)->group(function () {
            Route::get('/login', 'showLoginForm')->name('login');
            Route::post('/login/post', 'login')->name('login.post');
        });
        //forgetpassword controller
        Route::controller(ForgotPasswordController::class)->group(function () {
            Route::get('/reset-password', 'showLinkRequestForm')->name('resetPassword');
            Route::post('/reset-password/post', 'sendResetLinkEmail')->name('resetpassword.post');
        });
        //reset password controller
        Route::controller(ResetPasswordController::class)->group(function () {
            Route::get('/update-password/{token}', 'index')->name('updatePassword');
            Route::post('/update-password', 'update')->name('updatePassword.post');
        });
    });
    /**
     * guest route with admin guard end
     */
    /**
     * Authenticated with admin guard route start
     */
    Route::middleware(['auth:admin', 'checkStatus'])->group(function () {
        //logout
        Route::controller(LoginController::class)->group(function () {
            Route::post('/logout', 'logout')->name('logout');
        });
        //home route
        Route::controller(HomeController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('home');
        });
        //roles route
        Route::controller(RolesController::class)->prefix('roles')->as('roles.')->group(function () {
            Route::get('/index', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/destroy/{id}', 'destroy')->name('destroy');
        });
        //admin route
        Route::controller(AdminController::class)->as('admin.')->group(function () {
            Route::get('/index', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
        });
        //profile route
        Route::controller(ProfileController::class)->prefix('profile')->as('profile.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/update', 'update')->name('update');
            Route::post('/update-password', 'updatePassword')->name('password.update');
        });
        //settings route
        Route::prefix('settings')->as('settings.')->group(function () {
            Route::controller(GeneralSettingsController::class)->group(function () {
                Route::get('/general', 'generalSettings')->name('general');
                Route::post('/general/post/{id}', 'generalSettingsUpdate')->name('general.post');
            });
            Route::controller(ConfigSettingsController::class)->group(function () {
                Route::get('/config', 'configSettings')->name('config');
                Route::get('/config-optimize-clear', 'optimizeClear')->name('config.optimize.clear');
                Route::get('/config-optimize', 'optimize')->name('config.optimize');
            });
        });

        //user route
        Route::prefix('user')->as('user.')->controller(UserController::class)->group(function(){
            Route::get('/','index')->name('index');
            Route::get('/show/{id}','show')->name('show');
            Route::get('/status-update/{id}','statusUpdate')->name('statusUpdate');
            Route::get('/destroy/{id}','destroy')->name('destroy');
        });

        //category route
        Route::prefix('category')->as('category.')->controller(AdminCategoryController::class)->group(function(){
            Route::get('/','index')->name('index');
            Route::get('/create','create')->name('create');
            Route::post('/store','store')->name('store');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/status-update/{id}','statusUpdate')->name('statusUpdate');
            Route::get('/show/{id}','show')->name('show');
            Route::get('delete/{id}','destroy')->name('destroy');
        });
        //sub category route
        Route::prefix('sub-category')->as('subCategory.')->controller(AdminSubCategoryController::class)->group(function(){
            Route::get('/','index')->name('index');
            Route::get('/create','create')->name('create');
            Route::post('/store','store')->name('store');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/status-update/{id}','statusUpdate')->name('statusUpdate');
            Route::get('/show/{id}','show')->name('show');
            Route::get('delete/{id}','destroy')->name('destroy');
        });
        //child category  route
        Route::prefix('child-category')->as('childCategory.')->controller(AdminChildCategoryController::class)->group(function(){
            Route::get('/','index')->name('index');
            Route::get('/subcategory/{id}','subCategory')->name('getSubCategory');
            Route::get('/create','create')->name('create');
            Route::post('/store','store')->name('store');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/status-update/{id}','statusUpdate')->name('statusUpdate');
            Route::get('/show/{id}','show')->name('show');
            Route::get('delete/{id}','destroy')->name('destroy');
        });

        //brand route
        Route::prefix('brand')->as('brand.')->controller(AdminBrandController::class)->group(function(){
            Route::get('/','index')->name('index');
            Route::get('/create','create')->name('create');
            Route::post('/store','store')->name('store');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/status-update/{id}','statusUpdate')->name('statusUpdate');
            Route::get('/show/{id}','show')->name('show');
            Route::get('delete/{id}','destroy')->name('destroy');
        });

        //product route
        Route::prefix('product')->as('product.')->controller(AdminProductController::class)->group(function(){
            Route::get('/','index')->name('index');
            Route::get('/create','create')->name('create');
            Route::post('/store','store')->name('store');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/status-update/{id}','statusUpdate')->name('statusUpdate');
            Route::get('/show/{id}','show')->name('show');
            Route::get('delete/{id}','destroy')->name('destroy');

            Route::get('/get-sub-category/{id}','getSubcategory')->name('getSubcategory');
            Route::get('/get-child-category/{subCategory}','getChildCategory')->name('getChildCategory');
        });

        //product specification
        Route::as('productSpecification.')->controller(AdminProductSpecificationController::class)->group(function(){
            Route::get('/product/{id}/specifications','index')->name('index');
            Route::post('/product-specification-store','store')->name('store');
            Route::post('/product-specification-update/{id}','update')->name('update');
            Route::get('/product-specification-destroy/{id}','destroy')->name('destroy');
        });
        //tax route
        Route::prefix('tax')->as('tax.')->controller(AdminTaxController::class)->group(function(){
            Route::get('/','index')->name('index');
            Route::get('/create','create')->name('create');
            Route::post('/store','store')->name('store');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/status-update/{id}','statusUpdate')->name('statusUpdate');
            Route::get('/show/{id}','show')->name('show');
            Route::get('delete/{id}','destroy')->name('destroy');
        });
        //coupon route
        Route::prefix('coupon')->as('coupon.')->controller(AdminCouponController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/status-update/{id}', 'statusUpdate')->name('statusUpdate');
            Route::get('/type-update/{id}', 'typeUpdate')->name('typeUpdate');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('delete/{id}', 'destroy')->name('destroy');
        });
        //slider route
        Route::prefix('slider')->as('slider.')->controller(AdminSliderController::class)->group(function () {
            Route::get('/','index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/status-update/{id}', 'statusUpdate')->name('statusUpdate');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('delete/{id}', 'destroy')->name('destroy');
        });
        //heroproduct route
        Route::prefix('hero-product')->as('heroProduct.')->controller(AdminHeroProductController::class)->group(function () {
            Route::get('/edit', 'heroproduct')->name('edit');
            Route::post('/update/post/{id}', 'heroProductUpdate')->name('heroProduct.post');
        });
        //subscribe route
        Route::prefix('subscribe')->as('subscribe.')->controller(AdminSubscribeController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('delete/{id}', 'destroy')->name('destroy');
        });
        //contact route
        Route::prefix('contact')->as('contact.')->controller(AdminContactController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('delete/{id}', 'destroy')->name('destroy');
            Route::get('all-mail/{id}', 'allMail')->name('massage');
            Route::post('all-reply/store', 'allReply')->name('store');
        });
        //faq route
        Route::prefix('faq')->as('faq.')->controller(AdminFaqController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/status-update/{id}', 'statusUpdate')->name('statusUpdate');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('delete/{id}', 'destroy')->name('destroy');
        });
        //Quick link route
        Route::prefix('quick-link')->as('quickLink.')->controller(AdminQuickLinkController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/status-update/{id}', 'statusUpdate')->name('statusUpdate');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('delete/{id}', 'destroy')->name('destroy');
        });
        //team route
        Route::prefix('team')->as('team.')->controller(AdminTeamController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/status-update/{id}', 'statusUpdate')->name('statusUpdate');
            Route::get('delete/{id}', 'destroy')->name('destroy');
        });
                //contact route
        Route::prefix('tickets')->as('userMassage.')->controller(AdminUserMassageController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/{id}/show-reply', 'showReply')->name('showReply');
            Route::get('/{id}/send-reply/', 'allMassage')->name('massage');
            Route::post('reply/store', 'allReply')->name('store');
            Route::get('delete/{id}', 'destroy')->name('destroy');
        });

        //product attribute route
        Route::prefix('product-attributes')->as('productAttribute.')->controller(AdminProductAttributeController::class)->group(function(){
            Route::get('/','index')->name('index');
            Route::post('/store','store')->name('store');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/destory/{id}','destroy')->name('destroy');
        });

        
    });
    /**
     * Authenticated with admin guard route end
     */
});
/**
 * admin  route end
 */
