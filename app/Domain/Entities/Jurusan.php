<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Jurusan
 * @package App\Domain\Entities
 */

class Jurusan extends Entities


{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'nama', 'kuota',
    ];

}
