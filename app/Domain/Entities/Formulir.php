<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Formulir
 * @package App\Domain\Entities
 */
class Formulir extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'asal_sekolah', 'n_bi', 'n_mtk', 'n_ipa', 'n_ing', 'biodatas_id',
    ];
    protected $with = ['biodatas'];

    public function biodatas()
    {
        return $this->belongsTo('App\Domain\Entities\Biodata', 'biodatas_id');
    }
}
