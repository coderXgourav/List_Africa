<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/',[HomeController::class,'homePage']);
Route::get('/category/listing/{id}',[HomeController::class,'categoryWiseListing']);
Route::get('/listing/{id}',[HomeController::class,'listingDetails']);
Route::get('/category/country/listing/{country}',[HomeController::class,'ListingCountryDetails']);
Route::get('/all-category',[HomeController::class,'allCategory']);
Route::get('/all-location',[HomeController::class,'alllocation']);
Route::get('/first-blog',[HomeController::class,'firstBlog']);
Route::get('/second-blog',[HomeController::class,'secondBlog']);
Route::get('/third-blog',[HomeController::class,'thirdBlog']);

// THIS IS QUESTION POST ROUTE 
Route::post('/question',[HomeController::class,'questionPost']);
Route::post('/answer',[HomeController::class,'answerPost']);
Route::post('/answer-post',[HomeController::class,'userAnswerPost']);
Route::get('/authorized/google', [HomeController::class, 'redirectToGoogle']);
Route::get('/authorized/google/callback', [HomeController::class, 'handleGoogleCallback']);
Route::get('ans',[HomeController::class,'allAns']);
Route::get('/all-questions',[HomeController::class,'allQuestion']);
Route::get('/search',[HomeController::class,'searchFilter']);
Route::any('/upload',[HomeController::class,'imageUpload']);



// Route::get('login/facebook', [HomeController::class, 'redirectToFacebook']);
// Route::get('/facebook/redirect', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);