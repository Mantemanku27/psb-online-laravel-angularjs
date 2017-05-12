<?php

use Illuminate\Database\Seeder;

class PanitiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        // truncate record
        DB::table('panitias')->truncate();

        $panitias = [
            ['id' => 1, 'nama' => 'Nico Pradana', 'nip' => '1234567890', 'jurusan' => 'Rekayasa Perangkat Lunak', 'created_at' => \Carbon\Carbon::now()],
        ];

        // insert batch
        DB::table('panitias')->insert($panitias);
     }
}
