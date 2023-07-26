<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ListingController;



Route::get('/admin',function(){
    return view('admin/index');
});
Route::post('/admin-login',[AdminLoginController::class,'login']);


// THIS IS PROTECTED ROUTE 
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard',[AdminLoginController::class,'dashboard'])->name('admin.dashboard');
    Route::post('/logout',[AdminLoginController::class,'logout'])->name('admin.logout');

    //  THIS IS CATEGORY FEATURES ROUTE 
    Route::get('/admin/dashboard/add-category',[CategoryController::class,'addCategoryPage'])->name('admin.dashboard.add-category');
    Route::post('/admin/add-category',[CategoryController::class,'addCategory'])->name('admin.add-category');
    Route::get('/admin/dashboard/view-category',[CategoryController::class,'viewCategory'])->name('admin.dashboard.view-category');
    Route::post('/admin/dashboard/status',[CategoryController::class,'status']);
    Route::get('/admin/dashboard/category-update/{id}',[CategoryController::class,'categoryUpdatePage'])->name('admin.dashboard.category-update');
    Route::post('/admin/update-category',[CategoryController::class,'updateCategory']);
    Route::post('/admin/dashboard/category-delete',[CategoryController::class,'categoryDelete']);

    // THIS IS LISTING FEATURES ROUTE 
Route::get('/admin/dashboard/add-listing',[ListingController::class,'addListingPage'])->name('admin.dashboard.add-listing');
Route::post('admin/save-listing',[ListingController::class,'saveListing']);
Route::get('/admin/dashboard/view-listing',[ListingController::class,'listingView'])->name('admin.dashboard.view-listing');

Route::post('admin/dashboard/listing-status',[ListingController::class,'listingStatus']);
Route::get('/admin/dashboard/listing-update/{id}',[ListingController::class,'listingUpdatePage'])->name('admin.dashboard.listing-update');
Route::post('admin/update-listing',[ListingController::class,'updateListing']);
Route::post('/admin/dashboard/listing-delete',[ListingController::class,'listingDelete']);
Route::get('/admin/dashboard/users',[AdminLoginController::class,'userDetails']);
Route::get('/admin/dashboard/question',[AdminLoginController::class,'questionShow']);  
Route::get('/admin/dashboard/deactive/{id}',[AdminLoginController::class,'deactiveQuestion']) ;
Route::get('/admin/dashboard/active/{id}',[AdminLoginController::class,'activeQuestion']) ;
Route::get('/admin/dashboard/password',[AdminLoginController::class,'passChangeForm']) ;
Route::post('/admin/dashboard/password_change',[AdminLoginController::class,'changePassword']);
Route::get('/admin/dashboard/request',[AdminLoginController::class,'requestPage']) ;

Route::get('/admin/dashboard/search',[AdminLoginController::class,'searchListing']) ;

});



// THIS IS PROTECTED ROUTE 