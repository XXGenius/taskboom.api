<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 19.01.18
 * Time: 13:11
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_id', 'cycle_id'
    ];

}