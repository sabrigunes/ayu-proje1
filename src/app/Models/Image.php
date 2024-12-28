<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $timestamps = false;
    public static function getImagesForCar($car_id)
    {
        return Image::where('car_id', $car_id)->get();
    }

    public static function add($car_id, $title, $path){
        $image = new Image();
        $image->car_id = $car_id;
        $image->title = $title;
        $image->image = $path;
        $image->save();
    }

    public static function deleteImage($id)
    {
        $image = Image::find($id);
        $image->delete();
        return $image->car_id;
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
