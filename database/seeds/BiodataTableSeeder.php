<?php

use Illuminate\Database\Seeder;

class BiodataTableSeeder extends Seeder
{
    /**
     * Menjalankan SeederDatabase.
     *
     * @return void
     */

    public function run()
    {
        // truncate record
        DB::table('biodatas')->truncate();


//        $biodatas = [
//            ['id' => 1, 'nama_lengkap' => 'Lala po', 'foto' => 'lala.jpg', 'email' => 'lala@gmail.com', 'jk' => 'Perempuan', 'agama' => 'Islam', 'tempat_lahir' => 'Malang', 'tanggal_lahir' => '1999-03-22', 'alamat' => 'Jl.Sunan Ampel No 202', 'desa' => 'bulupitu', 'kecamatan' => 'Gondanglegi', 'kabupaten' => 'Malang', 'provinsi' => 'Jawa Timur', 'users_id' => '1', 'created_at' => \Carbon\Carbon::now()],
//        ];
//
//        // insert batch
//        DB::table('biodatas')->insert($biodatas);

//        $biodatas = [
//            ['id' => 1, 'nama_lengkap' => 'Lala po', 'foto' => 'lala.jpg', 'email' => 'lala@gmail.com', 'jk' => 'Perempuan', 'agama' => 'Islam', 'tempat_lahir' => 'Malang', 'tanggal_lahir' => '1999-03-22', 'alamat' => 'Jl.Sunan Ampel No 202', 'desa' => 'bulupitu', 'kecamatan' => 'Gondanglegi', 'kabupaten' => 'Malang', 'provinsi' => 'Jawa Timur', 'jurusan' => 'Rekayasa Perangkat Lunak', 'users_id' => '1', 'created_at' => \Carbon\Carbon::now()],
//        ];
//
//        // insert batch
//        DB::table('biodatas')->insert($biodatas);
    }
}
