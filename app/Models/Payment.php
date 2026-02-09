<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'registration_id',
        'amount',
        'payment_method',
        'status',
        'payment_date',
        'transaction_reference',
        'note',
    ];

    protected $casts = [
        'payment_date' => 'date',
        'amount' => 'decimal:2',
    ];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }
}
