<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
	use SoftDeletes;
    protected $fillable = ['path'];

    public function path()
    {
    	return config('image.path.relative') . $this->path; 
    }
}
