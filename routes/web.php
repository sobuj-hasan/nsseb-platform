<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\User\UserProfileController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('system/clear', function () {
    Artisan::call('optimize:clear');
    notify()->success('Cached cleared successfully', 'Cleared');
    return redirect('/');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth'])->name('dashboard');

// Route::redirect('/', 'index');

// Fontend Controller Routes
Route::get('vendor/register', [RegisteredUserController::class, 'vendorRegister'])->name('vendor.register');
Route::post('submit/vendor/register', [RegisteredUserController::class, 'vendorStore'])->name('vendor.store');
Route::get('matchmaker/register', [RegisteredUserController::class, 'matchmakerRegister'])->name('matchmaker.register');
Route::post('submit/matchmaker/register', [RegisteredUserController::class, 'matchmakerStore'])->name('matchmaker.store');
Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('home', [FrontendController::class, 'home'])->name('home');
Route::get('aboutus', [FrontendController::class, 'about'])->name('about.us');
Route::get('contact', [FrontendController::class, 'contact'])->name('contact.us');
Route::post('contactmsg', [FrontendController::class, 'contactmsg'])->name('contact.msg');
Route::get('services', [FrontendController::class, 'service'])->name('services');
Route::get('service/booking', [FrontendController::class, 'service_booking'])->name('service.booking');
Route::post('booking/request', [FrontendController::class, 'booking_request'])->name('booking.request');
Route::get('harmony/match/making', [FrontendController::class, 'harmony_match_making'])->name('harmony.match.making');
Route::get('organizing/events', [FrontendController::class, 'organizing_events'])->name('organizing.events');
Route::get('logistics', [FrontendController::class, 'logistics'])->name('logistics');
Route::get('profile/search/result', [FrontendController::class, 'profilesearchresult'])->name('profile.search.result');
Route::get('shop', [FrontendController::class, 'shop'])->name('shop');
Route::get('category/shop/{id}', [FrontendController::class, 'categorywiseshop'])->name('category.wise.shop');
Route::get('product/details/{id}', [FrontendController::class, 'productdetails'])->name('productdetails');
Route::get('product/search/result', [FrontendController::class, 'productsearch'])->name('productsearch');
Route::get('cart', [FrontendController::class, 'cart'])->name('cart');

Route::post('add_to_cart', [CartController::class, 'add_to_cart'])->name('add_to_cart');
Route::post('details_add_to_cart', [CartController::class, 'details_add_to_cart'])->name('details_add_to_cart');
// Route::post('add_to_wishlist', [CartController::class, 'add_to_wishlist'])->name('add_to_wishlist');

Route::get('cart/product/count', [CartController::class, 'cartproductcount'])->name('cart.count');
Route::get('cart/content', [CartController::class, 'cartcontent'])->name('cart.content');
Route::get('cart/summary', [CartController::class, 'cartsummary'])->name('cart.summary');
Route::post('order/store', [OrderController::class, 'store'])->name('order.store');


Route::get('checkout', [FrontendController::class, 'checkout'])->name('checkout');
Route::get('blog/details/{slug}', [FrontendController::class, 'blogdetails'])->name('blogdetails');
Route::post('nsseb/subscribe', [SubscribeController::class, 'subscribe'])->name('subscribe');

// Check
Route::resources([
    'wishlist' => 'WishlistController',
    'savelater' => 'SaveLaterController',
]);


// Dashboard Routes Checking
Route::group(
    ['namespace' => 'User', 'middleware' => 'auth'],
    function () {
        Route::get('user/logout', 'UserDashboardController@logout')->name('user.logout');
        Route::resources([
            'marriage/profile' => 'UserFormController',
            'myorder' => 'UserOrderController',
        ]);

        // Route::get('user/profile', 'ProfileController@index')->name('user.user.profile');
        Route::get('user/profile/edit', 'UsprofileController@edit')->name('user.user.profile.edit');
        Route::post('user/profile/update', 'UsprofileController@update')->name('user.user.profile.update');
        Route::get('user/setting', 'UsprofileController@setting')->name('user.user.setting');
        Route::post('user/setting/update', 'UsprofileController@changepassword')->name('user.user.setting.update');
        // for user profile
        Route::get('create/marriage/profile', [UserProfileController::class, 'accountinfo'])->name('account.info');
        // merrage profile show
        Route::get('search/result', [FrontendController::class, 'searchresult'])->name('searchresult');
        Route::get('profile/view/{id}', [FrontendController::class, 'profile'])->name('profile');

        // for user marriage profile
        Route::get('account/information', [UserProfileController::class, 'accountinfo'])->name('account.info');
        Route::get('account/photos', [UserProfileController::class, 'accountphotos'])->name('account.photos');
        Route::post('photo/upload', [UserProfileController::class, 'photoupload'])->name('account.photos.upload');
        //for user menu manage
        Route::get('myorder', [UserProfileController::class, 'myorder'])->name('my.order');
        Route::get('mywishlist', [UserProfileController::class, 'mywishlist'])->name('my.wishlist');
    }
);


require __DIR__ . '/auth.php';
require __DIR__ . '/vendor.php';
require __DIR__ . '/admin.php';


