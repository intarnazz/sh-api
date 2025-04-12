<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Client;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Material;
use App\Models\Service;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Way;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Factory::create();

        $files = Storage::disk('public')->files();

        foreach ($files as $file) {
            $image = Image::create([
                'path' => $file
            ]);
            Material::create([
                'image_id' => $image->id,
                'name' => $faker->word,
                'description' => $faker->text(200),
                'price' => $faker->numberBetween(1000, 20000),
            ]);
        }

        User::create([
            'login' => 'postman',
            'password' => 'postman',
        ]);

        for ($i = 0; $i < 3; $i++) {
            Client::create([
                'name' => $faker->name(),
                'company' => $faker->company(),
                'phone' => $faker->phoneNumber(),
            ]);
        }
    }
}
