<?php

namespace App\Repositories;

use App\Models\mahasiswa;
use App\Repositories\BaseRepository;

/**
 * Class mahasiswaRepository
 * @package App\Repositories
 * @version July 19, 2021, 12:49 pm UTC
*/

class mahasiswaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'nim',
        'kelas',
        'prodi',
        'jurusan'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return mahasiswa::class;
    }
}
