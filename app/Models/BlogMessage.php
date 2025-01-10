<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogMessage extends Model
{
    //
    // protected $table = "t_blog_messages";
    use SoftDeletes;
}
