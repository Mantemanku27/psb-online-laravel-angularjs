<?php
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PostTableSeeder::class);
        $this->call(JurusanTableSeeder::class);
        $this->call(FormulirTableSeeder::class);
        $this->call(PendaftaranTableSeeder::class);
        $this->call(BiodataTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
