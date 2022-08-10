<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Notification\SmsController;
use App\Http\Controllers\Notification\NotificationController;

Route::group(['prefix' => 'sms'], function () {
    Route::group(['as' => 'sms.'], function () {
        Route::get('', [SmsController::class, 'index'])->name('index');
        Route::post('',[SmsController::class, 'create'])->name('create');
        Route::get('send',[SmsController::class, 'send'])->name('send');
    });
});

