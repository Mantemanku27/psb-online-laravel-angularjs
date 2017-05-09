<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormulirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulirs', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('asal_sekolah');
            $table->integer('n_bi');
            $table->integer('n_mtk');
            $table->integer('n_ipa');
            $table->integer('n_ing');
            $table->string('biodatas_id');
            $table->string('jurusan');
            $table->string('jurusan_2');
            $table->string('user_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('formulirs');
    }
}
