<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name', 'description', 'deadline','user_id'
    ];

    function user(){
        return $this->BelongsTo('App\User');
    }

    function tasks(){
        return $this->hasMany('App\Task');
    }
}
