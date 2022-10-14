<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ormawas extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_ormawa',
        'nama_ormawa', 
        'pengampu',
        'image',
        'detail',
    ];
}
