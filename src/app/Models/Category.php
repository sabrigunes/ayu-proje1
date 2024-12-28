<?php

namespace App\Models;

use Carbon\Exceptions\Exception;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public static function getAllCategories()
    {
        return Category::all();
    }

    public static function add($name, $parent_id, $keywords, $desc, $image)
    {
        $category = new Category();
        $category->title = $name;
        $category->parent_id = $parent_id;
        $category->keywords = $keywords;
        $category->description = $desc;
        $category->image = $image;
        $category->status = true;
        $category->save();
    }

    public static function getCategory($id)
    {
        return Category::find($id);
    }

    public static function getCategoryId($title)
    {
        $category = Category::where('title',$title)->first();
        if(isset($category))
            return $category->id;
        return null;
    }


    public static function edit($id, $name, $parent_id, $keywords, $desc, $image)
    {
        $category = Category::find($id);
        $category->title = $name;
        $category->parent_id = $parent_id;
        $category->keywords = $keywords;
        $category->description = $desc;
        $category->image = $image;
        $category->status = true;
        $category->save();
    }



    public static function deactivateCategory($id)
    {
        $category = Category::find($id);
        $category->status = !$category->status;
        $category->save();
    }

    public static function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
    }

    public function cars()
    {
        return $this->hasMany(Car::class, 'category_id');
    }
}
