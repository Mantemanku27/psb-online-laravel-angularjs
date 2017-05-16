<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Biodata
 * @package App\Domain\Entities
 */

class Biodata extends Entities


{
    use SoftDeletes;

    /**
     * @var array
     */

    // Relasi Tabel
    protected $fillable = [

        'nama_lengkap', 'foto', 'email', 'telepon', 'jk', 'agama', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'desa', 'kecamatan', 'kabupaten', 'provinsi', 'users_id',
    ];
    protected $with = ['users'];



    public function users()
    {
        return $this->belongsTo('App\Domain\Entities\User', 'users_id');
    }


        public function jurusans()
    {
        return $this->belongsTo('App\Domain\Entities\Jurusan', 'jurusan');
    }


}
