<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Industry extends Model
{
    //
    protected $table = "industries";
      use SoftDeletes;

      public function products()
      {
          return $this->hasMany(Products::class, 'industry_id', 'id');
      }
   
}
