<?php

namespace App\Http\Resources;

use App\Http\Resources\TweetResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use PDO;

class TweetCollection extends ResourceCollection
{

    public $collects = TweetResource::class;
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection
        ];
    }


    //send meta data for likes with tweets
    public function with($request)
    {
        return [
            'meta' => [
                'likes' => $this->likes($request),
                'retweets' => $this->retweets($request)
            ]
        ];
    }

    //Grabs ids of liked tweet by $request->user()

    protected function likes($request)
    {
        if (!$user = $request->user()) {
            return [];
        }

        return $user->likes()
            ->whereIn(
                'tweet_id',
                $this->collection->pluck('id')->merge($this->collection->pluck('original_tweet_id'))
            )
            ->pluck('tweet_id')
            ->toArray();
    }

    protected function retweets($request)
    {
        if (!$user = $request->user()) {
            return [];
        }

        return $user->retweets()
            ->whereIn(
                'original_tweet_id',
                $this->collection->pluck('id')->merge($this->collection->pluck('original_tweet_id'))
            )
            ->pluck('original_tweet_id')
            ->toArray();
    }
}
