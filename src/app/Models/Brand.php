<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public static function getAllBrands(){
        return Brand::all();
    }

    public static function getBrand($id){
        return Brand::find($id);
    }

    public static function getBrandId($title)
    {
        $brand = Brand::where('title',$title)->first();
        if(isset($brand))
            return $brand->id;
        return null;
    }

    public static function add($name, $keywords, $desc, $image){
        $brand = new Brand();
        $brand->title = $name;
        $brand->keywords = $keywords;
        $brand->description = $desc;
        $brand->image = $image;
        $brand->status = true;
        $brand->save();
    }

    public static function edit($id, $name, $keywords, $desc, $image){
        $brand = Brand::find($id);
        $brand->title = $name;
        $brand->keywords = $keywords;
        $brand->description = $desc;
        $brand->image = $image;
        $brand->status = true;
        $brand->save();
    }

    public static function deactivateBrand($id){
        $brand = Brand::find($id);
        $brand->status = !$brand->status;
        $brand->save();
    }

    public static function deleteBrand($id){
        $brand = Brand::find($id);
        $brand->delete();
    }

}
