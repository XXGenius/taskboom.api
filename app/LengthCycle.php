<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 12.12.17
 * Time: 14:38
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class LengthCycle extends Model
{
    protected $fillable = [
        'date_start', 'date_end'
    ];

}