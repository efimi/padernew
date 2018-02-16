<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public static function getPhotosForLocation($id)
    {
    	$photos = Photo::where('location_id', $id)->select(['url'])->get();
    	return $photos;
    }
}
