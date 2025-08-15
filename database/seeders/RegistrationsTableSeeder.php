<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Event;
use App\Models\Registration;

class RegistrationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::role('Cliente')->get();
        $events = Event::all();
        $STATUSES = ['Pendiente', 'Confirmado', 'Asistido'];

        foreach ($users as $user) {
            foreach ($events as $event) {
                Registration::create([
                    'user_id' => $user->id,
                    'event_id' => $event->id,
                    'status' => $STATUSES[array_rand($STATUSES)],
                ]);
            }
        }
    }
}
