<?php

namespace Database\Seeders;

use App\Models\SpacecraftModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class SpacecraftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        SpacecraftModel::truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
        SpacecraftModel::create([
            'name' => $faker->text(10),
            'class' => 'Spaceship',
            'price' => $faker->randomFloat(2),
            'crew' => '10',
            'image' => 'DSI_hdapproach.jpg',
            'armament' => json_decode('{"title":"Gun","qty":50}'),
            'status' => 'Defunct'
        ]);
        }
    }
}
