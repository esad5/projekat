<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usluga extends Model
{
    public $timestamps = false;

    use HasFactory;

    /**
     * 
     * 
     * @var string[]
     */

     protected $fillable = [
        'code',
        'date',
        'grade',
        'description',
        'majstor',
        'car',
     ];
}
