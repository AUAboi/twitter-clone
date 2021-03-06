<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Events\Tweets\TweetRepliesWereUpdated;
use App\Models\Tweet;
use App\Tweets\TweetType;
use App\Models\TweetMedia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TweetReplyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->only(['store']);
    }

    public function store(Tweet $tweet, Request $request)
    {
        $reply = $request->user()->tweets()->create(array_merge($request->only('body'), [
            'type' => TweetType::TWEET,
            'parent_id' => $tweet->id
        ]));

        //Upload media
        foreach ($request->media as $id) {
            $reply->media()->save(TweetMedia::find($id));
        }


        // Since we are updating replies count, we pass parent tweet
        broadcast(new TweetRepliesWereUpdated($tweet));
    }
}
