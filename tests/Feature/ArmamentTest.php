<?php

namespace Tests\Feature;

use App\Models\SpacecraftModel;
use App\Models\Armament;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Auth;

class ArmamentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_armament()
    {
        $faker = \Faker\Factory::create();

        $user = User::factory()->create();
        $spacecraft = SpacecraftModel::create([
            'name' => $faker->text(10),
            'class' => 'Spaceship',
            'price' => $faker->randomFloat(2),
            'crew' => '10',
            'image' => 'DSI_hdapproach.jpg',
            'status' => 'Defunct'
        ]);

        Auth::login($user);

        $response = $this->postJson('api/armament', [
            'title' => 'Killstroyer', 'qty' => '100', 'spacecraft_id' => $spacecraft->id
            ]);

        $response->assertStatus(200)->assertSee(['success' => 'true']);
    }

    public function test_delete_armament() {

        $faker = \Faker\Factory::create();

        $user = User::factory()->create();
        $spacecraft =  SpacecraftModel::create([
            'name' => $faker->text(10),
            'class' => 'Spaceship',
            'price' => $faker->randomFloat(2),
            'crew' => '10',
            'image' => 'DSI_hdapproach.jpg',
            'status' => 'Defunct'
        ]);

        $armament = Armament::create([
            'title' => 'Killsploder',
            'qty' => 300,
            'spacecraft_id' => $spacecraft->id
        ]);

        Auth::login($user);

        $response = $this->deleteJson('api/armament/'.$armament->id.'/');

        $response->assertStatus(200)->assertSee(['success' => 'true']);
    }

    public function test_update_armament() {
        $faker = \Faker\Factory::create();

        $user = User::factory()->create();

        $spacecraft =  SpacecraftModel::create([
            'name' => $faker->text(10),
            'class' => 'Spaceship',
            'price' => $faker->randomFloat(2),
            'crew' => '10',
            'image' => 'DSI_hdapproach.jpg',
            'status' => 'Defunct'
        ]);

        $armament = Armament::create([
            'title' => 'Killsploder',
            'qty' => 300,
            'spacecraft_id' => $spacecraft->id
        ]);

        Auth::login($user);

        $response = $this->patchJson('api/armament/'.$armament->id.'/', [
            'title' => 'Spillkiller'
            ]);

        $response->assertStatus(200)->assertSee(['success' => 'true']);
    }

    public function test_show_armament() {
        $faker = \Faker\Factory::create();

        $spacecraft =  SpacecraftModel::create([
            'name' => $faker->text(10),
            'class' => 'Spaceship',
            'price' => $faker->randomFloat(2),
            'crew' => '10',
            'image' => 'DSI_hdapproach.jpg',
            'status' => 'Defunct'
        ]);

        $armament = Armament::create([
            'title' => 'Killsploder',
            'qty' => 300,
            'spacecraft_id' => $spacecraft->id
        ]);

        $response = $this->getJson('api/armament/'.$armament->id.'/', [
            'name' => $armament->name
            ]);

        $response->assertStatus(200)->assertSee(['name' => $armament->name]);
    }

    public function test_index_armament() {
        $response = $this->getJson('api/armament');

        $response->assertStatus(200);
    }
}
