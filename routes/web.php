<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckUserType;
use Illuminate\Support\Facades\Route;

// Tüm route'lar için middleware'i uygulamak
Route::middleware(['checkUserType'])->group(function () {

    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('/login', [UserController::class, 'loginIndex'])->name('login');
    Route::post('/login/post', [UserController::class, 'loginPost'])->name('login.post');

    Route::get('/register', [UserController::class, 'registerIndex'])->name('register');
    Route::post('/register/post', [UserController::class, 'registerPost'])->name('register.post');

    Route::get('auth-reset', [UserController::class, 'authReset'])->name('auth-reset');

    Route::controller(AdminController::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');

        Route::group(['prefix' => '/users', 'as' => 'user.'], function () {
            Route::get('/all', 'allUser')->name('all');
            Route::get('/details/{userId}', 'userDetails')->name('details');
            Route::post('/details/{userId}', 'userDetailsPost')->name('detailsPost');
            Route::post('/delete/{userId}', 'userDelete')->name('delete');
        });

        Route::group(['prefix' => '/request', 'as' => 'request.'], function () {
            Route::get('/details/{requestId}', 'requestDetails')->name('details');
            Route::post('/details/{requestId}', 'requestDetailsPost')->name('detailsPost');

            Route::get('/all', 'allRequest')->name('allRequest');
            Route::get('/completed', 'completedRequest')->name('completed');
            Route::get('/rejected', 'rejectedRequest')->name('rejected');
            Route::get('/pending', 'pendingRequest')->name('pending');
            Route::get('/progress', 'progressRequest')->name('progress');

            Route::get('/add', 'addRequest')->name('add');
            Route::post('/add-post/{requestId}', 'addRequestPost')->name('addPost');
        });
    });

    Route::controller(CustomerController::class)->prefix('customer')->name('customer.')->group(function () {
        Route::get('/users', 'allUsers')->name('allUsers');

        Route::group(['prefix' => '/request', 'as' => 'request.'], function () {
            Route::get('/details/{id}', 'requestDetails')->name('details');
            Route::post('/details/{id}', 'requestDetailsPost')->name('detailsPost');

            Route::get('/all', 'allRequest')->name('all');
            Route::get('/completed', 'completedRequest')->name('completed');
            Route::get('/rejected', 'rejectedRequest')->name('rejected');
            Route::get('/pending', 'pendingRequest')->name('pending');
            Route::get('/progress', 'progressRequest')->name('progress');

            Route::get('/add', 'addRequest')->name('add');
            Route::post('/add-post', 'addRequestPost')->name('addPost');
        });
    });
});

// Giriş ve kayıt sayfalarına yönlendirme
Route::get('/login', [UserController::class, 'loginIndex'])->name('login')->withoutMiddleware('checkUserType');
Route::get('/register', [UserController::class, 'registerIndex'])->name('register')->withoutMiddleware('checkUserType');
