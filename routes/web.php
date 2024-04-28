<?php

use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/send-message', [MessageController::class, 'send']);

Route::get('/message-status/{messageId}', [MessageController::class, 'checkMessageStatus']);
