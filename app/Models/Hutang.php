<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hutang extends Model
{
    use HasFactory;
    protected $table = "hutang";
    protected $fillable = ['nama', 'alamat', 'tanggal_hutang', 'jenis_kelamin',
                        'hutang', 'jaminan', 'cicilan_id', 'jatuhTempo'];
    protected $dates = ['jatuhTempo'];

    // Relasi One to Many
    public function cicilan() {
        return $this->belongsTo(Cicilan::class);     }
}
