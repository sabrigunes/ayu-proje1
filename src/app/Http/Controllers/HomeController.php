<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use App\Models\Category;
use App\Models\City;
use App\Models\Comment;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function postContact(Request $request)
    {
        Message::add($request->name, $request->email, $request->number, $request->subject, $request->message, $request->header('x-forwarded-for'));
        return redirect(route('contact'));
    }

    public function getIndex(Request $request)
    {
        return view('index')
            ->with('brands', Brand::getAllBrands())
            ->with('categories', Category::getAllCategories())
            ->with('cities', City::getAllCities())
            ->with('fuel_types', ['Benzin', 'Benzin & LPG', 'Dizel', 'Hybrid', 'Elektrik'])
            ->with('transmission_types', ['Otomatik', 'Manuel'])
            ->with('drivetrain', ['Önden Çekiş', 'Arkadan İtiş', '4WD (Sürekli)', 'AWD (Elektronik)'])
            ->with('colors', ['Beyaz', 'Siyah', 'Gri', 'Kırmızı', 'Mavi', 'Yeşil', 'Sarı', 'Turuncu', 'Bordo', 'Pembe', 'Gümüş', 'Altın', 'Mor', 'Bronz'])
            ->with('min_year', Car::getMinYear()[0]->year)
            ->with('cars', Car::getCarsForIndex($request));
    }

    public function getCarPage($url)
    {
        $tmp = explode('-', $url);
        $id = intval($tmp[array_key_last($tmp)]) - 1000;
        $car = Car::getCar($id);
        if (is_null($car))
            abort(404);

        return view('single')->with('car', $car);
    }

    public function postAddComment(Request $request)
    {
        Comment::add($request->comment, $request->rating, $request->car_id, Auth::user()->id, $request->ip());
        return redirect(route('get_car_page', Car::getUrl($request->car_id)));
    }


}
