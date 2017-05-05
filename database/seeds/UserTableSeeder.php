<?php


use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
public function run()
    {
        // truncate record
        DB::table('users')->truncate();

        $users = [
            ['id' => 1, 'nama' => 'Lalala', 'telepon' => '081000222777', 'email' => 'lalala@gmail.com', 'password' => bcrypt('lalala'), 'level' => '0', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 2, 'nama' => 'lololo', 'telepon' => '081222777000', 'email' => 'lololo@gmail.com', 'password' => bcrypt('lololo'), 'level' => '1', 'created_at' => \Carbon\Carbon::now()],
        ];

        // insert batch
        DB::table('users')->insert($users);
    }
}
