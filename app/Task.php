<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name', 'description', 'complete', 'deadline', 'project_id', 'user_id'
    ];

    function project(){
        return $this->BelongsTo('App\Project');
    }

    function user(){
        return $this->BelongsTo('App\User');
    }
}
