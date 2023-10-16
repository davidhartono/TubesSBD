<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Storage;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $image = $faker->image(public_path('img'), 640, 480, null, false);
        $path = 'public/img/' . $image;

        Storage::disk('public')->put($path, file_get_contents(public_path('img/' . $image)));

        DB::table('users')->insert([
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => 'rahasia',
            // 'image' => 'img/' . $image,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
