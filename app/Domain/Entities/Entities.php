<?php

namespace App\Domain\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Entities extends Model
{

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    public $incrementing = false;
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::generate()->string;
        });
        
    }

    /**
     * Generate new Uuid
     *
     * @return \Webpatser\Uuid\Uuid
     * @throws \Exception
     */
//    public function generateNewId()
//    {
//        return Uuid::generate(4);
//    }
//
//    /**
//     * Get Date now by Carbon
//     *
//     * @return static
//     */
//    public function dateNow()
//    {
//        return Carbon::now();
//    }

}