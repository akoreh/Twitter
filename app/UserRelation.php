<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRelation extends Model
{
    protected $table='user_relations';

    protected $fillable = [
      'follower_id',
      'followed_id'
    ];
}
