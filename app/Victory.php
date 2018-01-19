<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 19.01.18
 * Time: 13:11
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Victory extends Model
{
    protected $fillable = [
        'text', 'review_id'
    ];

}