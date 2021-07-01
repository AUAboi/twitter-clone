<?php

use App\Http\Controllers\Api\Media\MediaController;
use App\Http\Controllers\Api\Media\MediaTypesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Tweets\TweetController;
use App\Http\Controllers\Api\Timeline\TimelineController;
use App\Http\Controllers\Api\Tweets\TweetLikeController;
use App\Http\Controllers\Api\Tweets\TweetQuoteController;
use App\Http\Controllers\Api\Tweets\TweetReplyController;
use App\Http\Controllers\Api\Tweets\TweetRetweetController;

Route::get('/timeline', [TimelineController::class, 'index'])->name('timeline');

Route::post('/tweets', [TweetController::class, 'store']);

Route::post('/tweets/{tweet}/replies', [TweetReplyController::class, 'store']);


Route::post('/tweets/{tweet}/likes', [TweetLikeController::class, 'store']);
Route::delete('/tweets/{tweet}/likes', [TweetLikeController::class, 'destroy']);

Route::post('/tweets/{tweet}/retweets', [TweetRetweetController::class, 'store']);
Route::delete('/tweets/{tweet}/retweets', [TweetRetweetController::class, 'destroy']);

Route::post('/tweets/{tweet}/quotes', [TweetQuoteController::class, 'store']);

Route::post('/media', [MediaController::class, 'store']);
Route::get('/media/types', [MediaTypesController::class, 'index']);
