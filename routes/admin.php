<?php

use App\Http\Controllers\Admin\ActiveSellerController;
use App\Http\Controllers\Admin\AffiliateProductController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ErrorController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\SharedProductController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\LangController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

define('COUNT', 30);
Route::group(['middleware' => ['lang']], function () {
    // lang
    Route::get('lang/en', [LangController::class, 'en'])->name('admin.lang.en');
    Route::get('lang/ar', [LangController::class, 'ar'])->name('admin.lang.ar');
    Route::group(['prefix' => 'admin', 'middleware' => ['guest:admin']], function () {
        Route::get('/login', [AuthController::class, 'get_admin_login'])->name('get.admin.login');
        Route::post('login', [AuthController::class, 'login'])->name('admin.login');
    });
    Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function () {

        //Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        //Categories
        Route::resource('categories', CategoryController::class);
        //Countries
        Route::resource('countries', CountryController::class);
        //offers
        Route::resource('offers', OfferController::class);
        //transactions
        Route::resource('transactions', TransactionController::class);
        Route::get('transaction/seller/{id}', [TransactionController::class, 'get_seller_info'])->name('admin.seller.info');
        // products
        Route::resource('shared-products', SharedProductController::class);
        Route::match(['post', 'put', 'patch'], 'shared-products/{id}', [SharedProductController::class, 'update'])->name('admin.sharedproducts.update');
        Route::get('/shared-product/new-products', [SharedProductController::class, 'new_product'])->name('admin.new.shared.product');
        Route::get('/shared-product/suggested-products', [SharedProductController::class, 'suggested_product'])->name('admin.suggested.shared.product');
        Route::post('/shared-product/search', [SharedProductController::class, 'search'])->name('admin.search.shared.product');

        //
        Route::resource('affiliate-products', AffiliateProductController::class);
        Route::match(['post', 'put', 'patch'], 'affiliate-products/{id}', [AffiliateProductController::class, 'update'])->name('admin.affiliateproducts.update');
        Route::get('/affiliate-product/new-products', [AffiliateProductController::class, 'new_product'])->name('admin.new.affiliate.product');
        Route::get('/affiliate-product/suggested-products', [AffiliateProductController::class, 'suggested_product'])->name('admin.suggested.affiliate.product');
        Route::get('/affiliate-product/search', [AffiliateProductController::class, 'search'])->name('admin.search.affiliate.product');

        //
        Route::get('filter/shared-products/{country}', [SharedProductController::class, 'country_filter'])->name('admin.shared.country.filter');
        Route::get('filter/affiliate-products/{country}', [AffiliateProductController::class, 'country_filter'])->name('admin.affiliate.country.filter');
        //Seller
        Route::get('sellers', [ActiveSellerController::class, 'index'])->name('admin.sellers.index');
        Route::get('seller/show/{id}', [ActiveSellerController::class, 'show'])->name('admin.sellers.show');
        Route::match(['post', 'put', 'patch'], 'active-sellers/{id}', [ActiveSellerController::class, 'active'])->name('admin.sellers.active');
        Route::delete('sellers/delete/{id}', [ActiveSellerController::class, 'delete'])->name('admin.sellers.delete');
        //Leads
        Route::get('leads', [LeadController::class, 'index'])->name('admin.leads.index');
        Route::get('leads/edit/{id}', [LeadController::class, 'edit'])->name('admin.leads.edit');
        Route::match(['post', 'put', 'patch'], 'leads/update/{id}', [LeadController::class, 'update'])->name('admin.leads.update');
        Route::post('leads/delete/{id}', [LeadController::class, 'delete'])->name('admin.leads.delete');
        //logout
        Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');

        Route::fallback([ErrorController::class, 'error'])->name('admin.error');
    });
});
