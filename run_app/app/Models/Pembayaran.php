<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table    = 'pembayaran';
    protected $guarded = [];        // Atau Protected Fillable

    public function hutang() {
        return $this->belongsTo(Hutang::class, 'id_hutang');
    }
}