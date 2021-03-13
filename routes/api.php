<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Tweets\TweetController;
use App\Http\Controllers\Api\Timeline\TimelineController;



Route::get('/timeline', [TimelineController::class, 'index'])->name('timeline');

Route::post('/tweets', [TweetController::class, 'store']);
