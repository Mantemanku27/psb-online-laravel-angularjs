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
            $table->string('n_bi');
            $table->string('n_mtk');
            $table->string('n_ipa');
            $table->string('n_ing');
            $table->longText('foto_ijazah');
            $table->string('biodatas_id');
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
