<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/user',function(){
    return view('user.login');
});
Route::get('/sign-up',[UserController::class,'userRegisterPage']);

Route::post('/user/register',[UserController::class,'registerUser']);
Route::post('/user/login',[UserController::class,'userLogin']);

Route::post('/search-listing',[UserController::class,'searchListing']);
Route::post('/listing/rating-submit',[UserController::class,'ratingSubmit']);


Route::middleware(['user'])->group(function () {
Route::get('/user/dashboard',[UserController::class,'userDashobard']);
Route::post('/user/logout',[UserController::class,'userLogout']);
Route::get('/user/add-listing',[UserController::class,'userListingPage']);
Route::get('/user/password',[UserController::class,'userPasswordPage']);
Route::post('/user/save-listing',[UserController::class,'userSaveListing']);
Route::get('/user/listing',[UserController::class,'userListing']);
Route::post('/user/dashboard/listing-delete',[UserController::class,'deleteListing']);
Route::get('/user/dashboard/listing-update/{id}',[UserController::class,'userListingUpdatePage']);
Route::post('/user/update-listing',[UserController::class,'UpdateUserListing']);
Route::get('/logout',[UserController::class,'logoutUser']); 
Route::post('/user/password_change',[UserController::class,'changePassword']);
Route::get('/user/add-category-request',[UserController::class,'categoryRequest']);
Route::post('/user/request',[UserController::class,'requestSend']); 
Route::get('/user/search',[UserController::class,'userSearchList']);

});