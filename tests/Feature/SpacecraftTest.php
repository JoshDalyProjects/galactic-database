<?php

namespace Tests\Feature;

use App\Models\SpacecraftModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Auth;

class SpacecraftTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_spacecraft()
    {
        $user = User::factory()->create();

        Auth::login($user);

        $response = $this->postJson('api/spacecraft', [
            'name' => 'DeLorean', 'class' => 'Car', 'crew' => 1, 'price' => 88.88, 'status' => 'Past'
            ]);

        $response->assertStatus(200)->assertSee(['success' => 'true']);
    }

    public function test_delete_spacecraft() {

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

        Auth::login($user);

        $response = $this->deleteJson('api/spacecraft/'.$spacecraft->id.'/');

        $response->assertStatus(200)->assertSee(['success' => 'true']);
    }

    public function test_update_spacecraft() {
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

        Auth::login($user);

        $response = $this->patchJson('api/spacecraft/'.$spacecraft->id.'/', [
            'name' => 'DeLorean'
            ]);

        $response->assertStatus(200)->assertSee(['success' => 'true']);
    }

    public function test_show_spacecraft() {
        $faker = \Faker\Factory::create();

        $spacecraft =  SpacecraftModel::create([
            'name' => $faker->text(10),
            'class' => 'Spaceship',
            'price' => $faker->randomFloat(2),
            'crew' => '10',
            'image' => 'DSI_hdapproach.jpg',
            'status' => 'Defunct'
        ]);

        $response = $this->getJson('api/spacecraft/'.$spacecraft->id.'/', [
            'name' => $spacecraft->name
            ]);

        $response->assertStatus(200)->assertSee(['name' => $spacecraft->name]);
    }

    public function test_index_spacecraft() {
        $response = $this->getJson('api/spacecraft');

        $response->assertStatus(200)->assertSee(['class' => 'Spaceship']);
    }
}
