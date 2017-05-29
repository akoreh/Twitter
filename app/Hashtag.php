<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    protected $fillable =[
      'hashtag',
      'popularity'
    ];

    public static function getTrending(){

        $hashtags=self::orderBy('popularity','DESC')->get();

        if($hashtags){
            return $hashtags;
        }else{
            return false;
        }
    }

}
