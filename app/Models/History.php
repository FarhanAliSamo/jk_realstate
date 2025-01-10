<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    //
    protected $table = "history";
    
    protected $casts = [
        'before' => 'json',
        'after' => 'json',
    ];
}
