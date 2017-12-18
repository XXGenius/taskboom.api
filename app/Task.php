<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'text', 'checked', 'user_id', 'cycle_id', 'number' , 'priority_id'
    ];
}
