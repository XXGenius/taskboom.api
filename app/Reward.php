<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 20.12.17
 * Time: 12:20
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    protected $fillable = [
        'text', 'cycle_id' , 'user_id', 'task_id'
    ];
}