<?php

use App\Http\Controllers\FeedController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\PackageController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;

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

Route::get('/', [FeedController::class,'index'])->name('home');
Route::get('/dashboard', function () {
        return redirect()->route('home');
    })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('checkout',[CartController::class,'checkout'])->name('checkout');
    Route::get('order_success/{id}',[CartController::Class,'OrderSucess'])->name('orderSuccess');
});



Route::get('cart',[CartController::class,'index'])->name('cart.index');
Route::post('cart',[CartController::class,'store'])->name('cart.store');
Route::get('removeCart/{id}',[CartController::class,'removeItem'])->name('removeCartItem');

Route::get('about_us',[FeedController::class,'about_us'])->name('aboutus');
Route::get('contact_us',[FeedController::class,'contact_us'])->name('contactus');
Route::get('/product/{slug}',[FeedController::class,'show'])->name('front.product');
ROute::get('test',function(){
    $catpro = Category::getAllCategoriesWithProducts();
    return view('test',compact('catpro'));
});
Route::prefix('admin')->group(function(){
    Route::resource('product',ProductController::class,  [
            'names'=>[
                'index'=>'product.index',
                'create'=>'product.create',
                'show'=>'product.show',
                'edit'=>'product.edit',
                'update'=>'product.update',
                'store'=>'product.store',
                'destroy'=>'product.delete'
            ]
        ]);
    Route::resource('category',CategoryController::class,  [
            'names'=>[
                'index'=>'category.index',
                'create'=>'category.create',
                'show'=>'category.show',
                'edit'=>'category.edit',
                'update'=>'category.update',
                'store'=>'category.store',
                'destroy'=>'category.delete'
            ]
        ]);
    Route::resource('package',PackageController::class,  [
            'names'=>[
                'index'=>'package.index',
                'create'=>'package.create',
                'show'=>'package.show',
                'edit'=>'package.edit',
                'update'=>'package.update',
                'store'=>'package.store',
                'destroy'=>'package.delete'
            ]
        ]);        
    Route::resource('order',OrderController::class,  [
            'names'=>[
                'index'=>'order.index',
                'create'=>'order.create',
                'show'=>'order.show',
                'edit'=>'order.edit',
                'update'=>'order.update',
                'store'=>'order.store',
                'destroy'=>'order.delete'
            ]
        ]);
    Route::resource('coupon',CouponController::class,  [
            'names'=>[
                'index'=>'coupon.index',
                'create'=>'coupon.create',
                'show'=>'coupon.show',
                'edit'=>'coupon.edit',
                'update'=>'coupon.update',
                'store'=>'coupon.store',
                'destroy'=>'coupon.delete'
            ]
        ]);
    Route::resource('review',ReviewController::class,  [
            'names'=>[
                'index'=>'review.index',
                'create'=>'review.create',
                'show'=>'review.show',
                'edit'=>'review.edit',
                'update'=>'review.update',
                'store'=>'review.store',
                'destroy'=>'review.delete'
            ]
        ]);
});



require __DIR__.'/auth.php';


