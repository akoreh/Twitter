<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table='user_profile';

    protected $fillable=[

        'user_id',
        'display_name',
        'image_id',
        'url_handle'
    ];

    public function image(){
        return $this->belongsTo('App\Image');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
