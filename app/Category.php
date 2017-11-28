<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 28.11.17
 * Time: 15:32
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title'
    ];
}