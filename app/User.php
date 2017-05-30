<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function profile(){

        return $this->hasOne('App\UserProfile');
    }

    public function tweets(){
        return $this->hasMany('App\Tweet');
    }

    public function followers()
    {
        return $this->belongsToMany('App\User', 'user_relations', 'followed_id', 'follower_id');
    }



    public function following()
    {
        return $this->belongsToMany('App\User', 'user_relations', 'follower_id', 'followed_id');
    }

    public function  checkFollowing($user){

        foreach($this->following as $followedUser){
            if($followedUser->id == $user->id){
                return true;
            }
        }
        return false;
    }
}
