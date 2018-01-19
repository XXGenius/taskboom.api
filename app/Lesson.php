<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 19.01.18
 * Time: 13:12
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'text', 'review_id'
    ];
}