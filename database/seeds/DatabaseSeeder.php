<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Menjalankan SeederDatabase.
     *
     * @return void
     */
     
    public function run()
    {
       // Memanggil Class Seeder Biodata
       $this->call(BiodataTableSeeder::class);
       // Memanggil Class Seeder Formulir
       $this->call(FormulirTableSeeder::class);
       // Memanggil Class Seeder Jurusan
       $this->call(JurusanTableSeeder::class);
       // Memanggil Class Seeder Pendaftaran
       $this->call(PendaftaranTableSeeder::class);
       // Memanggil Class Seeder User
       $this->call(UserTableSeeder::class);
       // Memanggil Class Seeder Post Pemberitahuan
       $this->call(PostTableSeeder::class);
       // Memanggil Class Seeder Panitia
       $this->call(PanitiaTableSeeder::class);
    }
}
