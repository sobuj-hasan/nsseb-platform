<?php

use Illuminate\Support\Facades\Route;

// Vendor Panel all Routes
Route::group(
    ['namespace' => 'Vendor', 'middleware' => 'vendor'],
    function () {
        Route::get('vendor/dashboard', 'DashboardController@index')->name('vendor.dashboard');
        Route::resources([
            'vendorcategories' => 'CategoryController',
            'vendorsubcategories' => 'SubCategoryController',
            'vendorbrands' => 'BrandController',
            'vendorproducts' => 'ProductController',
            'myorder' => 'OrderShowController',
            // 'transection' => 'TransectionController',
            // 'myorder' => 'UserOrderController',
        ]);
        Route::get('vendor/getsubcategory', 'SubCategoryController@getsubcategory')->name('get.vendorsubcategory');

        Route::get('vendor/profile', 'VendorProfileController@index')->name('vendor.profile');
        Route::get('vendor/profile/edit', 'VendorProfileController@edit')->name('vendor.profile.edit');
        Route::post('vendor/profile/update', 'VendorProfileController@update')->name('vendor.profile.update');
        Route::get('vendor/setting', 'VendorProfileController@setting')->name('vendor.setting');
        Route::post('vendor/setting/update', 'VendorProfileController@changepassword')->name('vendor.setting.update');
    }
);




