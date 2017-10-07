<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    public $table="user_activity";
    
    protected $fillable = [
    		'user_id', 'activity'
    ];
}
