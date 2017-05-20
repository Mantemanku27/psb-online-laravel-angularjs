<?php

use Illuminate\Database\Seeder;

class JurusanTableSeeder extends Seeder
{
    /**
     * Menjalankan SeederDatabase.
     *
     * @return void
     */

    public function run()
    {
        // truncate record
        DB::table('jurusans')->truncate();

        $jurusans = [
            ['id' => 2, 'nama' => 'Rekayasa Perangkat Lunak', 'kuota' => '150', 'created_at' => \Carbon\Carbon::now()],
        ];

        // insert batch
        DB::table('jurusans')->insert($jurusans);
    }
}
