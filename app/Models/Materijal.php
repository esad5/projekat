<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materijal extends Model
{
    public $timestamps = false;

    use HasFactory;

    /**
     * 
     * 
     * @var string
     */

     protected $fillable = [
        'name',
        'price',
     ];
    
}
