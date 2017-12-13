<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 13.12.17
 * Time: 15:58
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    protected $fillable = [
        'text', 'cycle_id' , 'user_id'
    ];
}