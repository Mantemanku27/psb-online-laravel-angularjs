<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Panitia
 * @package App\Domain\Entities
 */

class Panitia extends Entities


{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'nama', 'nip', 'jurusan',
    ];

}
