<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Armament;
use DB;

class ArmamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        $faker = \Faker\Factory::create();

        $spacecraftIds = DB::table('spacecraft')->pluck('id');

        for ($i = 0; $i < 45; $i++) {
            Armament::create([
                'title' => $faker->randomElement([
                'Attackbuster',
                'Blowheater',
                'Chancechiller',
                'Cloudstabber',
                'Cursebreaker',
                'Curseglaive',
                'Demonblade',
                'Drillchucks',
                'Foglauncher',
                'Hexatracker',
                'Magnoshooter',
                'Magnotracker',
                'Netsmasher',
                'Nightdisk',
                'Ninjarifle',
                'Poisonrifle',
                'Quadbreaker',
                'Rustcrusher',
                'Rustshaker',
                'Shadowdriller',
                'Shinefist',
                'Spacetearer',
                'Trispear',
                'Warprifle',
                'Wishslayer']),
                'spacecraft_id' => $faker->randomElement($spacecraftIds),
                'qty' => $faker->randomDigitNotZero()
            ]);
        }
    }
}
