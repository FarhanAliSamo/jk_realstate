<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class BlogArticles extends Model
{
    //
    protected $table = "blog_articles";
    use SoftDeletes;
}
