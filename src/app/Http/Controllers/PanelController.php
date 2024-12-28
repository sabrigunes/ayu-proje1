<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use App\Models\Category;
use App\Models\City;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Message;
use App\Models\Setting;
use App\Models\User;
use Carbon\PHPStan\MacroExtension;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class PanelController extends Controller
{
    public function test(Request $request)
    {
        return Auth::user()->is_admin;
    }

    public function postRegisterPage(Request $request)
    {
        if ($request->toc != '1')
            return view('admin.register')->with('msg', ['Hata!', 'error', 'Kullanım Şartlarını kabul etmediniz. Lütfen kontrol edip tekrar deneyin.']);
        if ($request->password != $request->confirm)
            return view('admin.register')->with('msg', ['Hata!', 'error', 'Girdiğiniz parolalar birbiriyle eşleşmiyor. Lütfen kontrol edip tekrar deneyin.']);
        if (User::exists($request->email))
            return view('admin.register')->with('msg', ['Hata!', 'error', 'Girdiğiniz eposta adresi ile bir üyelik mevcut. Lütfen kontrol edip tekrar deneyin.']);

        User::add($request->name, $request->surname, $request->email, $request->phone, $request->password);
        return view('admin.login')->with('msg', ['Tebrikler!', 'success', 'Başarıyla kayıt oldunuz. Şimdi oturum açabilirsiniz.']);
    }

    public function postLoginPage(Request $request)
    {

        if (Auth::attempt($request->only(['email', 'password']))) {
            $request->session()->regenerate();
            return redirect(route('admin_get_car_list'));
        }

        return view('admin.login')->with('msg', ['Hata!', 'error', 'Kullanıcı adı veya parola yanlış. Lütfen kontrol edip tekrar deneyin.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('index'));
    }


    public function getRegisterPage()
    {
        return view('admin.register');
    }

    // start: cars

    public function getCarList()
    {
        $cars = Auth::user()->is_admin == '1' ? Car::getAllCars() : Car::getCarsForUser(Auth::user()->id);
        return view('admin.car-list')->with('cars', $cars);
    }

    public function getAddCar()
    {

        return view('admin.add-car')
            ->with('brands', Brand::getAllBrands())
            ->with('cities', City::getAllCities())
            ->with('categories', Category::getAllCategories());
    }

    public function confirmCar($id)
    {
        Car::confirmCar($id);
        return redirect(route("admin_get_car_list"));
    }

    public function deleteCar($id)
    {
        $car = Car::find($id);
        if ($car->user_id != Auth::user()->id)
            abort(401);

        $car->delete();

        return redirect(route("admin_get_car_list"));

    }

    public function getEditCar($id)
    {
        $car = Car::find($id);
        if ($car->user_id != Auth::user()->id)
            abort(401);

        return view("admin.edit-car")
            ->with('car', $car)
            ->with('brands', Brand::getAllBrands())
            ->with('cities', City::getAllCities())
            ->with('categories', Category::getAllCategories());
    }

    public function postEditCar(Request $request)
    {
        Car::edit(
            $request->id,
            $request->title,
            $request->keywords,
            $request->desc,
            $request->brand,
            $request->city,
            $request->price,
            $request->year,
            $request->fuel_type,
            $request->transmission,
            $request->kilometers,
            $request->body_type,
            $request->drivetrain,
            $request->engine_power,
            $request->engine_size,
            $request->color,
            $request->avg_fuel_com,
        );
        return redirect(route('admin_get_car_list'));
    }

    public function postAddCar(Request $request)
    {
        Car::add(
            $request->title,
            $request->keywords,
            $request->desc,
            $request->brand,
            $request->city,
            $request->price,
            $request->year,
            $request->fuel_type,
            $request->transmission,
            $request->kilometers,
            $request->body_type,
            $request->drivetrain,
            $request->engine_power,
            $request->engine_size,
            $request->color,
            $request->avg_fuel_com,
            Auth::user()->id
        );
        return redirect(route('admin_get_car_list'));
    }

    public function getCarImages($car_id){
        return view('admin.car-images')->with('images', Image::getImagesForCar($car_id))->with('car', Car::find($car_id));
    }

    public function postCarImages(Request $request){
        return "test";

    }

    public function deleteCarImage($id){
        $car = Image::deleteImage($id);
        return redirect(route("admin_get_car_images", $car));
    }

    public function postAddImages(Request $request){
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $fileName = $request->car_id.'_'.time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/'), $fileName);
                Image::add($request->car_id, $request->title, $fileName);
            }
        }
        return redirect(route('admin_get_car_images', $request->car_id));
    }

    // end: cars
    // start: messages
    public function getMessages(){
        $messages = Message::getAllMessages();
        return view('admin.messages')->with('messages', $messages);
    }
    public function deactivateMessage($id)
    {
        Message::deactivateMessage($id);
        return redirect(route('admin_get_messages'));
    }

    // end: messages
    // start: comments
    public function getComments(){
        $comments = Auth::user()->is_admin == '1' ? Comment::getAllComments() : Comment::getCommentsForUser(Auth::user()->id);
        return view('admin.comments')->with('comments', $comments);
    }
    public function changeStatusComment($id)
    {
        Comment::changeStatusComment($id);
        return redirect(route('admin_get_comments'));
    }

    public function editComment(Request $request)
    {
        Comment::edit($request->id, $request->comment, $request->rating);
        return redirect(route('admin_get_comments'));
    }

    public function deactivateComment($id)
    {
        Comment::deactivateComment($id);
        return redirect(route('admin_get_comments'));
    }

    public function deleteComment($id)
    {
        Comment::deleteComment($id);
        return redirect(route('admin_get_comments'));
    }


    // end: messages
    // start: brands
    public function getBrands()
    {
        $brands = Brand::getAllBrands();
        return view('admin.brands')->with('brands', $brands);
    }

    public function addBrand(Request $request)
    {
        $image = "data:" . $request->file('brand_image')->getClientMimeType() . ";base64,";
        $image .= base64_encode(file_get_contents($request->file('brand_image')));

        Brand::add($request->brand_name, $request->brand_keywords, $request->brand_desc, $image);
        return redirect(route('admin_get_brands'));
    }

    public function editBrand(Request $request)
    {
        $image = "data:" . $request->file('brand_image')->getClientMimeType() . ";base64,";
        $image .= base64_encode(file_get_contents($request->file('brand_image')));

        Brand::edit($request->id, $request->brand_name, $request->brand_keywords, $request->brand_desc, $image);
        return redirect(route('admin_get_brands'));
    }

    public function deactivateBrand($id)
    {
        Brand::deactivateBrand($id);
        return redirect(route('admin_get_brands'));
    }

    public function deleteBrand($id)
    {
        Brand::deleteBrand($id);
        return redirect(route('admin_get_brands'));
    }
    // end: brands
    // start: categories
    public function getCategories()
    {
        $categories = Category::getAllCategories();
        return view('admin.categories')->with('categories', $categories);
    }

    public function addCategory(Request $request)
    {
        $image = "data:" . $request->file('category_image')->getClientMimeType() . ";base64,";
        $image .= base64_encode(file_get_contents($request->file('category_image')));

        Category::add($request->category_name, $request->category_parent_id, $request->category_keywords, $request->category_desc, $image);
        return redirect(route('admin_get_categories'));
    }

    public function editCategory(Request $request)
    {
        $image = "data:" . $request->file('category_image')->getClientMimeType() . ";base64,";
        $image .= base64_encode(file_get_contents($request->file('category_image')));

        Category::edit($request->id, $request->category_name, $request->category_parent_id, $request->category_keywords, $request->category_desc, $image);
        return redirect(route('admin_get_categories'));
    }

    public function deactivateCategory($id)
    {
        Category::deactivateCategory($id);
        return redirect(route('admin_get_categories'));
    }

    public function deleteCategory($id)
    {
        Category::deleteCategory($id);
        return redirect(route('admin_get_categories'));
    }
    // end: categories
    // start: users
    public function getUsers()
    {
        $users = User::getAllUsers();
        return view('admin.users')->with('users', $users);
    }

    public function addUser(Request $request)
    {
        User::add($request->user_name, $request->user_surname, $request->user_email, $request->user_password, $request->user_auth == '1');
        return redirect(route('admin_get_users'));
    }

    public function editUser(Request $request)
    {
        User::edit($request->user_id, $request->user_name, $request->user_surname, $request->user_email, $request->user_password, $request->user_auth == '1');
        return redirect(route('admin_get_users'));
    }

    public function deactivateUser($id)
    {
        User::deactivateUser($id);
        return redirect(route('admin_get_users'));
    }

    public function changeAuthUser($id)
    {
        User::changeAuthUser($id);
        return redirect(route('admin_get_users'));
    }

    public function deleteUser($id)
    {
        User::deleteUser($id);
        return redirect(route('admin_get_users'));
    }
    // end: users
    // start: settings
    public function getSettings()
    {
        $settings = Setting::getSettings();
        return view('admin.settings')->with('settings', $settings);
    }

    public function editSettings(Request $request)
    {
        Setting::edit($request->title, $request->keywords, $request->description, $request->company, $request->address, $request->phone, $request->fax, $request->email, $request->smtp_server, $request->smtp_port, $request->smtp_email, $request->smtp_password, $request->facebook, $request->instagram, $request->twitter, $request->about_us, $request->contact, $request->references);
        return redirect(route('admin_get_settings'));
    }
    // end: settings

}

