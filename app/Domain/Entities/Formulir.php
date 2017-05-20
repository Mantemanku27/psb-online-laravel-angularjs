<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Formulir.
 * @package App\Domain\Entities
 */

class Formulir extends Entities

{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'asal_sekolah', 'n_bi', 'n_mtk', 'n_ipa', 'n_ing', 'foto_ijazah', 'biodatas_id','jurusan','jurusan_2','user_id'
    ];
    // Relasi Tabel.
    protected $with = ['biodatas'];

    public function biodatas()
    {
        return $this->belongsTo('App\Domain\Entities\Biodata', 'biodatas_id');
    }

//    public function jurusans()
//    {
//        return $this->belongsTo('App\Domain\Entities\Jurusan', 'jurusan');
//    }
//    public function jurusans2()
//    {
//        return $this->belongsTo('App\Domain\Entities\Jurusan', 'jurusan_2');
//    }

}
