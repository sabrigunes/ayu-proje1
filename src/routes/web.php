<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PanelController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'getIndex'])->name('index');
Route::view('/hakkimizda', 'about_us')->name('about_us');
Route::view('/kullanim-sartlari', 'terms')->name('terms');
Route::view('/bize-ulasin', 'contact')->name('contact');
Route::post('/bize-ulasin', [HomeController::class, 'postContact'])->name('post_contact');
Route::get('/ilan/{url}', [HomeController::class, 'getCarPage'])->name('get_car_page');

Route::prefix('panel')->group(function () {


    Route::middleware('guest')->group(function () {
        Route::view('/giris-yap', 'admin.login')->name('login');
        Route::post('/giris-yap', [PanelController::class, 'postLoginPage'])->name('post_login');
        Route::view('/kayit-ol', 'admin.register')->name('register');
        Route::post('/kayit-ol', [PanelController::class, 'postRegisterPage'])->name('post_register');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/logout', [PanelController::class, 'logout'])->name('logout');
        Route::post('/yorum-ekle', [HomeController::class, 'postAddComment'])->name('post_add_comment');

        // start: cars
        Route::get('/ilanlar', [PanelController::class, 'getCarList'])->name('admin_get_car_list');
        Route::get('/ilan-ekle', [PanelController::class, 'getAddCar'])->name('admin_get_add_car');
        Route::post('/ilan-ekle', [PanelController::class, 'postAddCar'])->name('admin_post_add_car');
        Route::get('/ilan-duzenle/{id}', [PanelController::class, 'getEditCar'])->name('admin_get_edit_car');
        Route::get('/ilan-fotograflari/{id}', [PanelController::class, 'getCarImages'])->name('admin_get_car_images');
        Route::post('/ilan-fotograflari/{id}', [PanelController::class, 'postCarImages'])->name('admin_post_car_images');
        Route::post('/ilan-fotografi-ekle', [PanelController::class, 'postAddImages'])->name('admin_post_add_images');
        Route::get('/ilan-fotografi-sil/{id}', [PanelController::class, 'deleteCarImage'])->name('admin_delete_car_image');
        Route::post('/ilan-duzenle', [PanelController::class, 'postEditCar'])->name('admin_post_edit_car');
        Route::get('/ilan-onay/{id}', [PanelController::class, 'confirmCar'])->name('admin_confirm_car');
        Route::get('/ilan-sil/{id}', [PanelController::class, 'deleteCar'])->name('admin_delete_car');
        // end: cars

        // start: comments
        Route::get('/yorumlar', [PanelController::class, 'getComments'])->name('admin_get_comments');
        Route::post('/yorum-duzenle', [PanelController::class, 'editComment'])->name('admin_post_edit_comment');
        Route::get('/yorum-deaktive/{id}', [PanelController::class, 'deactivateComment'])->name('admin_deactivate_comment');
        Route::get('/yorum-sil/{id}', [PanelController::class, 'deleteComment'])->name('admin_delete_comment');
        // end: comments



        Route::middleware(\App\Http\Middleware\AdminCheck::class)->group(function () {
            // start: messages
            Route::get('/mesajlar', [PanelController::class, 'getMessages'])->name('admin_get_messages');
            Route::get('/mesaj-okundu/{id}', [PanelController::class, 'deactivateMessage'])->name('admin_deactivate_message');
            // end: messages
            // start: brands
            Route::get('/markalar', [PanelController::class, 'getBrands'])->name('admin_get_brands');
            Route::post('/marka-ekle', [PanelController::class, 'addBrand'])->name('admin_post_add_brand');
            Route::get('/marka-sil/{id}', [PanelController::class, 'deleteBrand'])->name('admin_delete_brand');
            Route::get('/marka-deaktive/{id}', [PanelController::class, 'deactivateBrand'])->name('admin_deactivate_brand');
            Route::post('/marka-duzenle', [PanelController::class, 'editBrand'])->name('admin_post_edit_brand');
            // end: brands
            // start: categories
            Route::get('/kategoriler', [PanelController::class, 'getCategories'])->name('admin_get_categories');
            Route::post('/kategori-ekle', [PanelController::class, 'addCategory'])->name('admin_post_add_category');
            Route::get('/kategori-sil/{id}', [PanelController::class, 'deleteCategory'])->name('admin_delete_category');
            Route::get('/kategori-deaktive/{id}', [PanelController::class, 'deactivateCategory'])->name('admin_deactivate_category');
            Route::post('/kategori-duzenle', [PanelController::class, 'editCategory'])->name('admin_post_edit_category');
            // end: categories
            // start: users
            Route::get('/kullanicilar', [PanelController::class, 'getUsers'])->name('admin_get_users');
            Route::post('/kullanici-ekle', [PanelController::class, 'addUser'])->name('admin_post_add_user');
            Route::get('/kullanici-sil/{id}', [PanelController::class, 'deleteUser'])->name('admin_delete_user');
            Route::get('/kullanici-yetki-degisikligi/{id}', [PanelController::class, 'changeAuthUser'])->name('admin_change_auth_user');
            Route::get('/kullanici-deaktive/{id}', [PanelController::class, 'deactivateUser'])->name('admin_deactivate_user');
            Route::post('/kullanici-duzenle', [PanelController::class, 'editUser'])->name('admin_post_edit_user');
            Route::post('/kullanici-yetki-degisikligi', [PanelController::class, 'editUser'])->name('admin_post_edit_user');
            // end: users
            // start: settings
            Route::get('/ayarlar', [PanelController::class, 'getSettings'])->name('admin_get_settings');
            Route::post('/ayarlar', [PanelController::class, 'editSettings'])->name('admin_post_settings');
            // end: settings
        });
    });
});


