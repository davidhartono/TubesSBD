<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Storage;
use Faker\Factory as Faker;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $recipes = [
            [
                'title' => 'Recipe 1',
                'image' => 'img/recipe/image1.jpg',
                // Other fields...
            ],
            [
                'title' => 'Recipe 2',
                'image' => 'image2.jpg',
                // Other fields...
            ],
            // Add more recipe entries...
        ];
        // $faker = Faker::create();
        // $image = $faker->image(public_path('img/recipe'), 640, 480, null, false);
        // $path = 'public/img/' . $image;

        // Storage::disk('public')->put($path, file_get_contents(public_path('img/recipe/' . $image)));

        // DB::table('recipes')->insert([
        //     'author_id' => 1,
        //     'image' => 'img/recipe/' . $image,
        //     'title' => $faker->sentence,
        //     'description' => $faker->paragraph,
        //     'portion' => $faker->numberBetween(1, 10),
        //     'time' => $faker->numberBetween(10, 60),
        //     'ingredient' => $faker->paragraph,
        //     'step' => $faker->paragraph,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
    }
}
