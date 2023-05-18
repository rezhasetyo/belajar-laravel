<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Hutang extends Model
{
    use HasFactory;
    protected $table = "hutang";
    protected $fillable = ['nama', 'alamat', 'tanggal_hutang', 'jenis_kelamin',
                        'hutang', 'jaminan', 'cicilan_id', 'jatuhTempo', 'status',
                        'tanggal_bayar'];

    protected $dates = ['jatuhTempo', 'tanggal_hutang', 'tanggal_bayar'];

    // Relasi One to Many
    public function cicilan() {
        return $this->belongsTo(Cicilan::class);     
    }

    public function pembayaran() {
        return $this->hasMany(Pembayaran::class);      
    }

    public static function get_jatuh_tempo($cicilan_id, $tanggal_hutang){
        if($cicilan_id == 1){
            $jatuhTempo = Carbon::parse($tanggal_hutang)->addMonth(6)->timestamp;
        }elseif($cicilan_id == 2) {
            $jatuhTempo = Carbon::parse($tanggal_hutang)->addYear(1)->timestamp;
        }elseif($cicilan_id == 3) {
            $jatuhTempo = Carbon::parse($tanggal_hutang)->addYear(2)->timestamp;
        }else{
            $jatuhTempo = Carbon::parse($tanggal_hutang)->addYear(3)->timestamp;
        }

        return $jatuhTempo;
    }
}
