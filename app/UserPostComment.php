<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPostComment extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function post(){
        return $this->belongsTo(UserPostComment::class, 'post_id', 'id');
    }
}
