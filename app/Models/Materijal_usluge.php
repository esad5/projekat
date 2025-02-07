<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materijal_usluge extends Model
{
    public $timestamps = false;

    use HasFactory;

    /**
     * 
     * 
     * @var string
     */

     protected $fillable = [
        'kolicina',
        'usluga',
        'materijal',
     ];
}
