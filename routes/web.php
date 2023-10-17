<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\CarCategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\BuyerController;
use App\Http\Controllers\Admin\BuyOrderController as AdminBuyOrderController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CarImagesController;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\RentOrderController as AdminRentOrderController;
use App\Http\Controllers\Client\BuyController;
use App\Http\Controllers\Client\CarController as ClientCarController;
use App\Http\Controllers\Client\ContactController as ClientContactController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Staff\BuyerController as StaffBuyerController;
use App\Http\Controllers\Staff\BuyOrderController;
use App\Http\Controllers\Staff\ContactController as StaffContactController;
use App\Http\Controllers\Staff\RentOrderController;
use App\Models\Car;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';




// Route::get('/admin', function () {
//     return view('admin/layout/master');
// });



Route::prefix('admin')->middleware('auth.admin')->name('admin.')->group(function () {
    //user
    // Route::get('user', [UserController::class, 'index'])->name('user.list');
    // //product category
    // Route::get('product_category', [ProductCategoryController::class, 'index'])->name('product_category.list');
    // Route::get('product_category/add', [ProductCategoryController::class, 'add'])->name('product_category.add');
    // Route::post('product_category/store', [ProductCategoryController::class, 'store'])->name('product_category.store');
    // Route::get('product_category/{id}', [ProductCategoryController::class, 'detail'])->name('product_category.detail');
    // Route::post('product_category/update/{id}', [ProductCategoryController::class, 'update'])->name('product_category.update');
    // Route::get('product_category/destroy/{id}', [ProductCategoryController::class, 'destroy'])->name('product_category.destroy');
    // //product
    // Route::get('product', [ProductController::class, 'index'])->name('product.list');
    // Route::resource('product', ProductController::class);
    // Route::post('product/slug', [ProductController::class, 'createSlug'])->name('product.create.slug');
    // Account
    Route::resource('account', AccountController::class);
    Route::get('account/{account}/restore', [AccountController::class, 'restore'])->name('account.restore');

    // Car Category
    Route::resource('car_category', CarCategoryController::class);
    Route::get('car_category/{car_category}/restore', [CarCategoryController::class, 'restore'])->name('car_category.restore');


    // Brand
    Route::resource('brand', BrandController::class);
    Route::get('brand/{brand}/restore', [BrandController::class, 'restore'])->name('brand.restore');

    // Buyer
    Route::resource('buyer', BuyerController::class);
    Route::get('buyer/{buyer}/restore', [BuyerController::class, 'restore'])->name('buyer.restore');

    // Car
    Route::resource('car', CarController::class);
    Route::get('car/{car}/restore', [CarController::class, 'restore'])->name('car.restore');
    Route::post('car/slug', [CarController::class, 'createSlug'])->name('car.create.slug');

    // Car Images
    Route::resource('car_images', CarImagesController::class);

    // Contact
    Route::resource('contact', ContactController::class);

    //Buy Order
    Route::resource('buy_order', AdminBuyOrderController::class);

    //Rent Order
    Route::resource('rent_order', AdminRentOrderController::class);

    //Dashboard
    Route::get('chart', [ChartController::class, 'index'])->name('chart');
});


// ->middleware('auth.staff')

Route::prefix('staff')->middleware('auth.staff')->name('staff.')->group(function () {
    Route::resource('buyer', StaffBuyerController::class);
    Route::get('buyer/send_to_order/{id}', [StaffBuyerController::class, 'sendToOrder'])->name('buyer.send_to_order');
    Route::resource('contact', StaffContactController::class);
    Route::resource('buy_order', BuyOrderController::class);
    Route::resource('rent_order', RentOrderController::class);
});


Route::prefix('client')->name('client.')->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    // Route::get('cars', [ClientCarController::class, 'index'])->name('cars');
    // Route::post('cars/filteredIndex', [ClientCarController::class, 'filteredIndex'])->name('cars.filteredIndex');
    Route::get('cars', [ClientCarController::class, 'index'])->name('cars');
    Route::post('cars', [ClientCarController::class, 'index'])->name('cars');
    Route::get('detail/{id?}/{slug}', [ClientCarController::class, 'detail'])->name('detail');




    Route::post('detail/{id}/store', [BuyController::class, 'store'])->name('detail.store');
    Route::get('contact', [ClientContactController::class, 'index'])->name('contact');
    Route::post('contact', [ClientContactController::class, 'store'])->name('contact.store');
    Route::get('about', [PageController::class, 'toAbout'])->name('about');
    Route::get('blog', [PageController::class, 'toBlog'])->name('blog');
    Route::get('blog_detail', [PageController::class, 'toBlogDetail'])->name('blog_detail');
    Route::get('team', [PageController::class, 'toTeam'])->name('team');
    Route::get('testimonials', [PageController::class, 'toTestimonials'])->name('testimonials');
    Route::get('faq', [PageController::class, 'toFaq'])->name('faq');
    Route::get('terms', [PageController::class, 'toTerms'])->name('terms');
});
