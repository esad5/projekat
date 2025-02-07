<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //

    public $timestamps = false;

    use HasFactory;
    /**
     * 
     * @var string[]
     */

     protected $fillable = [

        'name',
        'year',
        'engine',
        'code',
        'air:condition',
        'brand'
     ];
}
