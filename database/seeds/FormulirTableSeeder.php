<?php


use Illuminate\Database\Seeder;

class FormulirTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
public function run()
    {
        // truncate record
        DB::table('formulirs')->truncate();

//        $formulirs = [
//            ['id' => 1, 'asal_sekolah' => 'SMPN 4 Gondanglegi', 'n_bi' => '27', 'n_mtk' => '27', 'n_ipa' => '27', 'n_ing' => '27', 'biodatas_id' => '1',  'jurusan' => 'Rekayasa Perangkat Lunak', 'jurusan_2' => 'Rekayasa Perangkat Lunak', 'user_id' => '1','created_at' => \Carbon\Carbon::now()],
//        ];
//
//        // insert batch
//        DB::table('formulirs')->insert($formulirs);
    }
}
