<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use SoftDeletes;

    public static function getAllCars()
    {
        return Car::with('images')->limit(10)->get();
    }

    public static function getCarsForIndex($request)
    {
         $query = Car::with('images');
        if(isset($request->body_type)){
            $t = Category::getCategoryId($request->body_type);
            if (!is_null($t))
                $query->where('category_id', '=', $t);
        }
        if(isset($request->brand)){
            $t = Brand::getBrandId($request->brand);
            if (!is_null($t))
                $query->where('brand_id', '=', $t);
        }
        if(isset($request->fuel_type))
            $query->where('fuel_type', '=', $request->fuel_type);
        if(isset($request->transmission))
            $query->where('transmission', '=', $request->transmission);
        if(isset($request->city)){
            $t = City::getCityId($request->city);
            if (!is_null($t))
                $query->where('city', '=', $t);
        }
        if(isset($request->status)){
            if($request->status == 'Sıfır')
                $query->where('kilometers', '=', 0);
            elseif($request->status == 'İkinci El')
                $query->where('kilometers', '>', 0);
        }
        if(isset($request->min_year))
            $query->where('year', '>=', $request->min_year);
        if(isset($request->max_year))
            $query->where('year', '<=', $request->max_year);
        if(isset($request->drivetrain))
            $query->where('drivetrain', '=', $request->drivetrain);
        if(isset($request->color))
            $query->where('color', '=', $request->color);

        // TODO: Max - Min Price

        return $query->limit(20)->get(); // TODO: Paginate
    }

    public static function getCarsForUser($user_id)
    {
        return Car::where('user_id', $user_id)->get();
    }

    public static function getCar($id)
    {
        $car = Car::find($id);
        $car->category = Category::getCategory($car->category_id);
        $car->user = User::getUser($car->user_id);
        $car->brand = Brand::getBrand($car->brand_id);
        $car->comments = Comment::getCommentsForSelectedCar($id);
        $car->images = Image::getImagesForCar($id);
        return $car;
    }

    public static function getUrl($id){
        $car = Car::find($id);
        return strtolower(str_replace(' ', '-', $car->title).'-'.strval($car->id + 1000));
    }

    public static function add($title, $keywords, $desc, $brand, $city,$price, $year, $fuel_type, $transmission, $kilometers, $body_type, $drivetrain, $engine_power, $engine_size, $color, $avg_fuel_com, $user_id)
    {
        $car = new Car();
        $car->title = $title;
        $car->keywords = $keywords;
        $car->description = $desc;
        $car->brand_id = $brand;
        $car->city = $city;
        $car->price = $price;
        $car->year = $year;
        $car->fuel_type = $fuel_type;
        $car->transmission = $transmission;
        $car->kilometers = $kilometers;
        $car->category_id = $body_type;
        $car->drivetrain = $drivetrain;
        $car->engine_power = $engine_power;
        $car->engine_size = $engine_size;
        $car->color = $color;
        $car->image = 'unknown.jpg';
        $car->avg_fuel_consumption = $avg_fuel_com;
        $car->user_id = $user_id;
        $car->status = '0';
        $car->save();
    }

    public static function edit($id, $title, $keywords, $desc, $brand, $city, $price, $year, $fuel_type, $transmission, $kilometers, $body_type, $drivetrain, $engine_power, $engine_size, $color, $avg_fuel_com)
    {
        $car = Car::find($id);
        $car->title = $title;
        $car->keywords = $keywords;
        $car->description = $desc;
        $car->brand_id = $brand;
        $car->city = $city;
        $car->price = $price;
        $car->year = $year;
        $car->fuel_type = $fuel_type;
        $car->transmission = $transmission;
        $car->kilometers = $kilometers;
        $car->category_id = $body_type;
        $car->drivetrain = $drivetrain;
        $car->engine_power = $engine_power;
        $car->engine_size = $engine_size;
        $car->color = $color;
        $car->image = 'unknown.jpg';
        $car->avg_fuel_consumption = $avg_fuel_com;
        $car->updated_at = Carbon::now();
        $car->save();
    }

    public static function confirmCar($id)
    {
        $car = Car::find($id);
        $car->status = $car->status == '1' ? '-1' : '1';
        $car->save();
    }

    public static function deleteCar($id)
    {
        $car = Car::find($id);
        $car->delete();
    }

    public static function getMinYear(){
        return Car::select('year')->orderBy('year', 'ASC')->limit(1)->get();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
