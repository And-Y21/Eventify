<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'registration_id', 
        'amount', 
        'payment_date', 
        'payment_method'
    ];

    public function registration()
    {
        return $this->belongsTo(Registration::class, 'registration_id');
    }
}
