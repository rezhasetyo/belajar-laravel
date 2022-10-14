<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orma extends Model
{
    use HasFactory;

    protected $table = "ormas";
    protected $fillable = [
        'kode_ormas','name','pengampu','detail', 'image'
    ];
}