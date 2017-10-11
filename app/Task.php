<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'text', 'group_task_id', 'project_id', 'date'
    ];
}
