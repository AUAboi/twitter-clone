<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Events\Tweets\TweetRetweetsWereUpdated;
use App\Events\Tweets\TweetWasCreated;
use App\Events\Tweets\TweetWasDeleted;
use App\Models\Tweet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tweets\TweetType;

class TweetRetweetController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->only(['store']);
    }
    public function store(Tweet $tweet, Request $request)
    {
        $retweet = $request->user()->tweets()->create([
            'type' => TweetType::RETWEET,
            'original_tweet_id' => $tweet->id
        ]);

        broadcast(new TweetWasCreated($retweet));

        broadcast(new TweetRetweetsWereUpdated($request->user(), $tweet));
    }

    public function destroy(Tweet $tweet, Request $request)
    {
        broadcast(new TweetWasDeleted($tweet->retweetedTweet));
        $tweet->retweetedTweet()->where('user_id', $request->user()->id)->delete();
        broadcast(new TweetRetweetsWereUpdated($request->user(), $tweet));
    }
}
