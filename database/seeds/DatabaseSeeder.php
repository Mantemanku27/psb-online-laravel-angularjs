<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Menjalankan SeeserDatabase
     *
     * @return void
     */
     
    public function run()
    {
        // Class Seeder Biodata
//        $this->call(BiodataTableSeeder::class);
        // Class Seeder Formulir
//        $this->call(FormulirTableSeeder::class);
        // Class Seeder Jurusan
//        $this->call(JurusanTableSeeder::class);
        // Class Seeder Pendaftaran
//        $this->call(PendaftaranTableSeeder::class);
//        // Class Seeder User
//        $this->call(UserTableSeeder::class);
//        // Class Seeder Post Pemberitahuan
//        $this->call(PostTableSeeder::class);
        // Class Seeder Panitia
        $this->call(PanitiaTableSeeder::class);
    }
}
