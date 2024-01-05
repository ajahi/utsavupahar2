<?php

use App\Http\Controllers\FeedController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Livewire\SearchWebsite;

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

Route::get('/', [FeedController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return redirect()->route('home');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::get('order_success/{id}', [OrderController::class, 'orderSuccess'])->name('order.success');
    Route::get('track-order/{id}', [OrderController::class, 'track'])->name('order.track');
    Route::post('order', [OrderController::class, 'store'])->name('store.checkout');
    Route::get('/blogs', [BlogController::class, 'blogs'])->name('frontend.blogs.index');



    //    All content mangement system routes
    Route::prefix('admin')->group(function () {
        Route::get("/", function () {
            return redirect("/admin/dashboard");
        });
        Route::get('/notifications', [NotificationController::class, 'getAllNotifications']);
        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::post('/users/role/{user}', [UserController::class, 'assignRole'])->name('users.assign_role');
        Route::post('/users/permission/{user}', [UserController::class, 'assignPermission'])->name('users.assign_permission');
        Route::resource('product', ProductController::class,  [
            'names' => [
                'index' => 'product.index',
                'create' => 'product.create',
                'show' => 'product.show',
                'edit' => 'product.edit',
                'update' => 'product.update',
                'store' => 'product.store',
                'destroy' => 'product.delete'
            ]
        ]);
        Route::resource('category', CategoryController::class,  [
            'names' => [
                'index' => 'category.index',
                'create' => 'category.create',
                'show' => 'category.show',
                'edit' => 'category.edit',
                'update' => 'category.update',
                'store' => 'category.store',
                'destroy' => 'category.delete'
            ]
        ]);
        Route::resource('package', PackageController::class,  [
            'names' => [
                'index' => 'package.index',
                'create' => 'package.create',
                'show' => 'package.show',
                'edit' => 'package.edit',
                'update' => 'package.update',
                'store' => 'package.store',
                'destroy' => 'package.delete'
            ]
        ]);
        Route::resource('order', OrderController::class,  [
            'names' => [
                'index' => 'order.index',
                'show' => 'order.show',
                'edit' => 'order.edit',
                'update' => 'order.update',
                'destroy' => 'order.delete'
            ]
        ]);
        Route::resource('coupon', CouponController::class,  [
            'names' => [
                'index' => 'coupon.index',
                'create' => 'coupon.create',
                'show' => 'coupon.show',
                'edit' => 'coupon.edit',
                'update' => 'coupon.update',
                'store' => 'coupon.store',
                'destroy' => 'coupon.delete'
            ]
        ]);
        Route::resource('review', ReviewController::class,  [
            'names' => [
                'index' => 'review.index',
                'create' => 'review.create',
                'show' => 'review.show',
                'edit' => 'review.edit',
                'update' => 'review.update',
                'store' => 'review.store',
                'destroy' => 'review.delete'
            ]
        ]);
        Route::resource('roles', RoleController::class,  [
            'names' => [
                'index' => 'roles.index',
                'create' => 'roles.create',
                'show' => 'roles.show',
                'edit' => 'roles.edit',
                'update' => 'roles.update',
                'store' => 'roles.store',
                'destroy' => 'roles.delete',
            ]
        ]);
        Route::post('/{role}/update-permissions', [RoleController::class, 'change'])->name('roles.permissions.change');
        Route::resource('permissions', PermissionController::class,  [
            'names' => [
                'index' => 'permissions.index',
                'create' => 'permissions.create',
                'show' => 'permissions.show',
                'edit' => 'permissions.edit',
                'update' => 'permissions.update',
                'store' => 'permissions.store',
                'destroy' => 'permissions.delete',
            ]
        ]);
        Route::post('/{permission}/update-roles', [PermissionController::class, 'change'])->name('permissions.roles.change');
        Route::resource('blog', BlogController::class,  [
            'names' => [
                'index' => 'blog.index',
                'create' => 'blog.create',
                'show' => 'blog.show',
                'edit' => 'blog.edit',
                'update' => 'blog.update',
                'store' => 'blog.store',
                'destroy' => 'blog.delete',
            ]
        ]);
    });
});
Route::get('otp/{id}', [RegisteredUserController::class, 'otpShow'])->name('otp.show');
Route::post('otpVerification', [RegisteredUserController::class, 'otpVerification'])->name('otp.verification');


Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::post('cart', [CartController::class, 'store'])->name('cart.store');
Route::get('removeCart/{id}', [CartController::class, 'removeItem'])->name('removeCartItem');
Route::post('reduceItemByOne', [CartController::class], 'reduceItemByOne')->name('reduceItemByOne');
Route::post('addItemByOne', [CartController::class], 'addItemByOne')->name('addItemByOne');



// frontend cms
Route::get('about_us', [FeedController::class, 'about_us'])->name('aboutus');
Route::get('contact_us', [FeedController::class, 'contact_us'])->name('contactus');
Route::get('/product/{slug}', [FeedController::class, 'show'])->name('front.product');
Route::get('/search', [SearchController::class, 'search'])->name('search');


ROute::get('/category/{slug}', [CategoryController::class, 'showBySlug'])->name('front.category');
Route::get('test', function () {
    $res = new Otp();
    $res->generate('9805816686', 5, 10);
    return $res->generate('9805816686', 5, 10);
});
Route::get('res', function () {

    $otp = new Otp();
    $resp = $otp->validate(9805816686, 62744);
    return $resp;
});



require __DIR__ . '/auth.php';
