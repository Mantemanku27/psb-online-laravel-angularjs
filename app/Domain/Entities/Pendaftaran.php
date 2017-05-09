<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pendaftaran
 * @package App\Domain\Entities
 */
class Pendaftaran extends Entities
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'no_pilihan', 'status', 'jurusans_id', 'formulirs_id','user_id',
    ];
    protected $with=['jurusans','formulirs'];
    public function jurusans()
    {
        return $this->belongsTo('App\Domain\Entities\Jurusan', 'jurusans_id');
        
    }
    public function formulirs()
    {
        return $this->belongsTo('App\Domain\Entities\Formulir', 'formulirs_id');
        
    }
}
