<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 25.09.17
 * Time: 17:45
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class ExpLvl extends Model
{
    protected $fillable = [
        'exp','level'
    ];
}