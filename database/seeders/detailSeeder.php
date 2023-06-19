<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class detailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($x = 1; $x <= 20; $x++){
 
        	// insert data dummy pegawai dengan faker
        	DB::table('posts')->insert([
        		'judul' => $faker->words(rand(5, 15), true),
        		'konten' => $faker->paragraph(),
                'tgl_post' =>$faker->date()
        	]);
 
        }
 
    
    }
}
