<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    protected $fillable = ['matter','active'];

    /**
     * One to One Relation
     * Opinion belongs to particular user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){

        return $this->belongsTo('App\User');

    }

   /* public function likedBy(){

        return $this->belongsToMany('App\User','opinion_user');
    }*/

    public function userLikes(){

        return $this->belongsToMany('App\User');
    }

}
