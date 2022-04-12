<?php

namespace Database\Seeders;

use App\Models\SpacecraftModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use DB;

class SpacecraftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 15; $i++) {
        SpacecraftModel::create([
            'name' => $faker->text(10),
            'class' => 'Spaceship',
            'price' => $faker->randomFloat(2),
            'crew' => '10',
            'image' => 'DSI_hdapproach.jpg',
            'status' => 'Defunct'
        ]);
        }
    }
}
