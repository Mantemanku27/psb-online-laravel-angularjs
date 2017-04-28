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
            ['id' => 1, 'nama' => 'Lalala', 'telepon' => '081000222777', 'email' => 'lalala@gmail.com', 'password' => 'lalala', 'level' => '01', 'created_at' => \Carbon\Carbon::now()],
        ];

        // insert batch
        DB::table('users')->insert($users);
    }
}
