<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hutang extends Model
{
    use HasFactory;
    protected $table = "hutang";

    // Relasi One to Many
    public function cicilan() {
        return $this->hasMany(Cicilan::class);     }// Yang tidak ada foreign key nya (belongsTo)
}
