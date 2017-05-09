<?php


use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
public function run()
    {
        // truncate record
        DB::table('posts')->truncate();

        $posts = [
            ['id' => 1, 'judul' => 'Pendaftaran Siswa Baru', 'gambar' => 'http://smkn1kepanjen.sch.id/post/daftar.jpg', 'deskripsi' => 'pendaftaran dimulai tang....', 'created_at' => \Carbon\Carbon::now()],
        ];

        // insert batch
        DB::table('posts')->insert($posts);
    }
}
