<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 18.12.17
 * Time: 14:16
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $fillable = [
        'date', 'user_id', 'comment_task', 'comment_progress', 'gratitude_day'
    ];

}