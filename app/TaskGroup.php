<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 25.09.17
 * Time: 16:53
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class TaskGroup extends Model
{
    protected $fillable = [
        'day','month','year'
    ];
}