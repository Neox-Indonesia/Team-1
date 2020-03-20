<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class post extends Model
{
	use SoftDeletes;

    protected $table = 'posts';
    protected $fillable = ['title', 'slug', 'image', 'content', 'view_count'];
    protected $dates = ['deleted_at'];
}
