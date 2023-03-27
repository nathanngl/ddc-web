<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Office\AuthController;
use App\Http\Controllers\Office\DashboardController;
use App\Http\Controllers\Office\UserController;
use App\Http\Controllers\Office\DonationProgramController;
use App\Http\Controllers\Office\CategoryController;
use App\Http\Controllers\Office\CashController;

Route::group(['domain' => ''], function() {
    Route::get('auth',[AuthController::class, 'index'])->name('auth');
    Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('office')->name('office.')->group(function(){
        Route::redirect('dashboard','auth', 301);
        Route::get('auth',[AuthController::class, 'index'])->name('auth');
        Route::post('login',[AuthController::class, 'do_login'])->name('login');            
        Route::middleware(['auth'])->group(function(){
            Route::get('logout',[AuthController::class, 'do_logout'])->name('logout');
        
            Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');
    
            Route::prefix('cash')->name('cash.')->group(function(){
                Route::get('',  [CashController::class, 'index'])->name('index');
                Route::get('create',[CashController::class, 'create'])->name('create');
                Route::get('edit/{cash}',  [CashController::class, 'edit'])->name('edit');
                Route::post('store',     [CashController::class, 'store'])->name('store');
                Route::post('update/{cash}',   [CashController::class, 'update'])->name('update');
                Route::delete('destroy/{cash}', [CashController::class, 'destroy'])->name('destroy');
                Route::post('accept/{cash}',  [CashController::class, 'accept'])->name('accept');
                Route::post('deny/{cash}',  [CashController::class, 'deny'])->name('deny');
            });
            Route::prefix('donation')->name('donation.')->group(function(){
                Route::get('',  [DonationProgramController::class, 'index'])->name('index');
                Route::get('create',[DonationProgramController::class, 'create'])->name('create');
                Route::get('edit/{donation}',  [DonationProgramController::class, 'edit'])->name('edit');
                Route::post('store',     [DonationProgramController::class, 'store'])->name('store');
                Route::post('update/{donation}',   [DonationProgramController::class, 'update'])->name('update');
                Route::delete('destroy/{donation}', [DonationProgramController::class, 'destroy'])->name('destroy');
                Route::post('accept/{donation}',  [DonationProgramController::class, 'accept'])->name('accept');
                Route::post('deny/{donation}',  [DonationProgramController::class, 'deny'])->name('deny');
            });
            Route::prefix('category')->name('category.')->group(function(){
                Route::get('',  [CategoryController::class, 'index'])->name('index');
                Route::get('create',[CategoryController::class, 'create'])->name('create');
                Route::get('edit/{category}',  [CategoryController::class, 'edit'])->name('edit');
                Route::post('store',[CategoryController::class, 'store'])->name('store');
                Route::post('update/{category}',   [CategoryController::class, 'update'])->name('update');
                Route::delete('destroy/{category}', [CategoryController::class, 'destroy'])->name('destroy');
            });
            Route::prefix('users')->name('users.')->group(function(){
                Route::get('',  [UserController::class, 'index'])->name('index');
                Route::get('profile', [UserController::class, 'profile'])->name('profile');
                Route::get('create',[UserController::class, 'create'])->name('create');
                Route::get('edit/{user}',  [UserController::class, 'edit'])->name('edit');
                Route::post('store',     [UserController::class, 'store'])->name('store');
                Route::post('updateAdmin/{user}',   [UserController::class, 'updateAdmin'])->name('updateAdmin');
                Route::post('updateSuper/{user}',   [UserController::class, 'updateSuper'])->name('updateSuper');
                Route::post('updateUser/{user}',   [UserController::class, 'updateUser'])->name('updateUser');
                Route::delete('destroy/{user}', [UserController::class, 'destroy'])->name('destroy');
                Route::post('editPassword', [UserController::class, 'editPassword'])->name('editPassword');
            });        
        });
    });
});