<?php


use Illuminate\Database\Seeder;

class PendaftaranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
       // truncate record
       DB::table('pendaftarans')->truncate();

//     $pendaftarans = [
//         ['id' => 1, 'no_pilihan' => 'Pilihan Pertama', 'status' => 'diterima', 'jurusans_id' => '1', 'formulirs_id' => '1', 'user_id' => '1','created_at' => \Carbon\Carbon::now()],
//        ];
//
//     // insert batch
//     DB::table('pendaftarans')->insert($pendaftarans);
    }
}
