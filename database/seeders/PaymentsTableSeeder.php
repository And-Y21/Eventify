<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Payment;
use App\Models\Registration;
use Carbon\Carbon;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $registrations = Registration::with('event')->get();
        $paymentMethods = ['tarjeta', 'efectivo', 'transferencia'];
        $statuses = ['pendiente', 'completado', 'fallido', 'reembolsado'];

        foreach ($registrations as $registration) {
            $method = $paymentMethods[array_rand($paymentMethods)];
            $status = fake()->randomElement($statuses);

            Payment::create([
                'registration_id' => $registration->id,
                'amount' => $registration->event->price,
                'payment_method' => $method,
                'status' => $status,
                'payment_date' => Carbon::parse($registration->created_at)->addMinutes(rand(1, 60)),
                'transaction_reference' => $status === 'completado' ? strtoupper(fake()->bothify('PAY-####-????')) : null,
                'note' => fake()->optional(0.3)->sentence(),
            ]);
        }
    }
}
