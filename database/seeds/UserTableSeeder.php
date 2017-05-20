<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Menjalankan SeederDatabase.
     *
     * @return void
     */
    
    public function run()
    {
        // truncate record
        DB::table('users')->truncate();

        $users = [
            ['id' => 1, 'nama' => 'SMKN 1 Kepanjen', 'telepon' => '0341395777', 'konfirmasi' => '0', 'email' => 'smkn1kepanjen@ymail.com', 'password' => bcrypt('kanesa'), 'level' => '0', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 2, 'nama' => 'Mustofa bisri', 'telepon' => '081000222777', 'konfirmasi' => '0', 'email' => 'mustofa@gmail.com', 'password' => bcrypt('mustofa'), 'level' => '1', 'created_at' => \Carbon\Carbon::now()],
        ];

        // insert batch
        DB::table('users')->insert($users);
    }
}
