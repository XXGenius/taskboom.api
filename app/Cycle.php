<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 12.12.17
 * Time: 13:26
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    protected $fillable = [
        'date_start', 'date_end', 'length_cycle_id' , 'user_id', 'day_id', 'autofill'
    ];
}
