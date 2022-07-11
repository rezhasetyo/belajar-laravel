<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cicilan extends Model
{
    use HasFactory;
    protected $table = "cicilan";

    // Relasi One to Many
    public function hutang() {
        return $this->hasMany(Hutang::class);     }
}
