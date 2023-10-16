<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Storage;
use Faker\Factory as Faker;

class TipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $image = $faker->image(public_path('img/tips'), 640, 480, null, false);
        $path = 'public/img/' . $image;

        Storage::disk('public')->put($path, file_get_contents(public_path('img/tips/' . $image)));

        DB::table('tips')->insert([
            'author_id' => 1,
            'image' => 'img/tips/' . $image,
            'title' => $faker->sentence,
            'step' => $faker->paragraph,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
