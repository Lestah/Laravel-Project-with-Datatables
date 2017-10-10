<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public $fillable = ['title','body'];
    //protected $table = 'blog_post';
    //protected $fillable = ['task', 'description','done'];

}
