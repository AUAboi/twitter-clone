<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Tweets\TweetController;
use App\Http\Controllers\Api\Timeline\TimelineController;
use App\Http\Controllers\Api\Tweets\TweetLikeController;
use App\Http\Controllers\Tweets\TweetRetweetController;

Route::get('/timeline', [TimelineController::class, 'index'])->name('timeline');

Route::post('/tweets', [TweetController::class, 'store']);

Route::post('/tweets/{tweet}/likes', [TweetLikeController::class, 'store']);
Route::delete('/tweets/{tweet}/likes', [TweetLikeController::class, 'destroy']);

Route::post('/tweets/{tweet}/retweets', [TweetRetweetController::class, 'store']);
Route::delete('/tweets/{tweet}/retweets', [TweetRetweetController::class, 'destroy']);
