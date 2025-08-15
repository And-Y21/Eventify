<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use Faker\Factory as Faker;
use Illuminate\Support\Testing\Fakes\Fake;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            Event::create([
                'title' => $faker->word(),
                'description' => $faker->sentence(),
                'event_date' => $faker->dateTimeBetween('now', '+1 year'),
                'event_time' => $faker->time(),
                'max_attendees' => $faker->numberBetween(1, 100),
                'price' => $faker->randomFloat(2, 0, 100),
                'state' => $faker->state(),
                'zip_code' => $faker->numberBetween(10000, 99999),
                'block' => $faker->word(),
                'street' => $faker->streetName(),
                'interior_number' => $faker->numberBetween(1, 100),
                'exterior_number' => $faker->numberBetween(1, 100)
            ]);
        }
    }
}
