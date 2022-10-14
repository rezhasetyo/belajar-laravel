<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class mahasiswa
 * @package App\Models
 * @version July 19, 2021, 12:49 pm UTC
 *
 * @property string $nama
 * @property string $nim
 * @property string $kelas
 * @property string $prodi
 * @property string $jurusan
 */
class mahasiswa extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'mahasiswas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama',
        'nim',
        'kelas',
        'prodi',
        'jurusan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama' => 'string',
        'nim' => 'string',
        'kelas' => 'string',
        'prodi' => 'string',
        'jurusan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'nim' => 'required',
        'kelas' => 'required',
        'prodi' => 'required',
        'jurusan' => 'required'
    ];

    
}
