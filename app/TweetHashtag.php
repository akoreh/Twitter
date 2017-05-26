<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TweetHashtag extends Model
{
    protected $table='tweet_hashtags';

    protected $fillable = [
        'tweet_id',
        'hashtag_id'
    ];
}
