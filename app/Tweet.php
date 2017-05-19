<?php

namespace App;

use Embed\Embed;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{

    protected $fillable=[

        'user_id',
        'tweet'
    ];


    public function getEmbed()
    {
        $string = $this->tweet;
        if (preg_match_all('/(https?|ssh|ftp):\/\/[^\s"]+/', $string, $url)) {

            $single_url = $url[0][0];


            if ($single_url) {
                $embed = Embed::create($single_url);

                $embedArray = (array)$embed;

                if(!empty($embedArray)){
                    return $embed;
                }

            } else {
                return false;
            }
        }
    }

    public function withoutURL(){
        $string =  preg_replace('/https?:\/\/[^\s"<>]+/', '',$this->tweet);

        return $string;
    }

    public function user(){
        return $this->belongsTo('App\User');
    }




}
