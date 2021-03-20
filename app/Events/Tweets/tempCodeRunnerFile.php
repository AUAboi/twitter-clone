<?php
public function broadcastWith()
    {
        return (new TweetResource($this->tweet))->jsonSerialize();
    }

    public function broadcastAs()
    {
        return 'TweetWasCreated';
    }