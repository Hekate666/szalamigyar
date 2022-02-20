<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Szalami extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'termek_nev',
        "termek_ar",
        "termek_alapanyag",
        "gyartasi_ido"
    ];

}
