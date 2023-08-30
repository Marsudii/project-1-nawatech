<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

//route no login
Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'home'])->name('fe-home');
Route::get('/shop', [App\Http\Controllers\Frontend\ShopController::class, 'shop'])->name('fe-shop');
Route::get('/shop/{slug}', [App\Http\Controllers\Frontend\ShopController::class, 'shopDetail'])->name('fe-shop-detail');

/* Route Auth */
//route login
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('post-login', [App\Http\Controllers\Auth\LoginController::class, 'postLogin'])->name('login.post');
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
//route registration
Route::get('registration', [App\Http\Controllers\Auth\RegisterController::class, 'registration'])->name('register');
Route::post('post-registration', [App\Http\Controllers\Auth\RegisterController::class, 'postRegistration'])->name('register.post');
Route::get('account/verify/{token}', [App\Http\Controllers\Auth\RegisterController::class, 'verifyAccount'])->name('user.verify');

// These routes will require users to have a verified email address
Route::middleware(['is_verify_email'])->group(function () {

    Route::get('profile/{id}', [App\Http\Controllers\Frontend\ProfileController::class, 'profile'])->middleware(['auth'])->name('profile');
    Route::post('profile/update-image/{id}', [App\Http\Controllers\Frontend\ProfileController::class, 'profileUpdateImage'])->middleware(['auth'])->name('profile-update-image');
    Route::post('profile/update-personal/{id}', [App\Http\Controllers\Frontend\ProfileController::class, 'profileUpdatePersonal'])->middleware(['auth'])->name('profile-update-personal');

    //route product
    Route::get('product', [App\Http\Controllers\Frontend\ProductController::class, 'product'])->middleware(['auth'])->name('product');
    Route::get('product/add', [App\Http\Controllers\Frontend\ProductController::class, 'productAdd'])->middleware(['auth'])->name('product-add');
    Route::post('product/add-data', [App\Http\Controllers\Frontend\ProductController::class, 'productAddData'])->middleware(['auth'])->name('product-add-data');
    Route::get('product/update/{id}', [App\Http\Controllers\Frontend\ProductController::class, 'productUpdate'])->middleware(['auth'])->name('product-update');
    Route::post('product/update-data/{id}', [App\Http\Controllers\Frontend\ProductController::class, 'productUpdateData'])->middleware(['auth'])->name('product-update-data');
    Route::get('product/delete-data/{id}', [App\Http\Controllers\Frontend\ProductController::class, 'productDelete'])->middleware(['auth'])->name('product-delete-data');
    //route cart
    Route::get('cart/{id}', [App\Http\Controllers\Frontend\CartController::class, 'cart'])->middleware(['auth'])->name('cart');
    Route::get('cart/{id}/{slug}', [App\Http\Controllers\Frontend\CheckoutController::class, 'checkoutProduct'])->middleware(['auth'])->name('checkout-product');
    Route::post('cart', [App\Http\Controllers\Frontend\CartController::class, 'checkoutCart'])->middleware(['auth'])->name('cart-add');
    Route::post('cart/order-all', [App\Http\Controllers\Frontend\CartController::class, 'orderAll'])->middleware(['auth'])->name('order-all');
    Route::post('cart/order/{id}', [App\Http\Controllers\Frontend\CartController::class, 'orderOne'])->middleware(['auth'])->name('order-one');
    //route order
    Route::get('order/{id}', [App\Http\Controllers\Frontend\OrderController::class, 'order'])->middleware(['auth'])->name('order');
    Route::post('order/success/{id}', [App\Http\Controllers\Frontend\OrderController::class, 'orderSuccess'])->middleware(['auth'])->name('order-success');
    Route::post('order/cancel/{id}', [App\Http\Controllers\Frontend\OrderController::class, 'orderCancel'])->middleware(['auth'])->name('order-cancel');
    Route::post('order/delete/{id}', [App\Http\Controllers\Frontend\OrderController::class, 'orderDelete'])->middleware(['auth'])->name('order-delete');
    //route export xls
    Route::get('order/export/{id}', [App\Http\Controllers\Frontend\OrderController::class, 'exportExcel'])->middleware(['auth'])->name('export-excel');
});
