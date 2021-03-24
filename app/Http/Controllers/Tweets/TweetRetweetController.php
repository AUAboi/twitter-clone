<?php

namespace App\Http\Controllers\Tweets;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetRetweetController extends Controller
{
    public function store(Tweet $tweet, Request $request)
    {
    }

    public function destroy(Tweet $tweet, Request $request)
    {
    }
}
