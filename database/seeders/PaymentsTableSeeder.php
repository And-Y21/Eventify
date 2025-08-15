<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Payment;
use App\Models\Registration;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $registrations = Registration::all();
        $PAYMENT_METHODS = ['card', 'efective', 'transfer'];

        foreach ($registrations as $registration) {
            Payment::create([
                'registration_id' => $registration->id,
                'amount' => $registration->event->price,
                'payment_date' => now(),
                'payment_method' => $PAYMENT_METHODS[array_rand($PAYMENT_METHODS)],
            ]);
        }
    }
}
