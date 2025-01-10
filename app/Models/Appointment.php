<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'appointment_date', 'message',
    ];

    // You can define any additional relationships, attributes, or methods here.
}
