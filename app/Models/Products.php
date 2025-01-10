<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Products extends Model
{
    //
    protected $table = "products";
    use SoftDeletes;

    public function industry()
    {
        return $this->belongsTo(Industry::class, 'industry_id', 'id');
    }
    
}
