<?php

use App\Models\Product;
use App\Models\ProductColor;
use App\Livewire\Admin\Brand\Index;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductColorController;

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
Route::group(['prefix' => 'auth'], function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('/login', [LoginController::class, 'index'])->name('login');
        Route::post('/login', [LoginController::class, 'login'])->name('login.post');
        Route::get('/register', [RegisterController::class, 'index'])->name('register');
        Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
    });
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});
Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard')
        ->middleware(['auth', 'isAdmin']);
        Route::controller(AdminOrderController::class)->group(function () {
            Route::get('/order', 'index')->name('admin.order.list');
            Route::get('/order/{id}/detail', 'show')->name('admin.order.show');
            Route::post('/order/add', 'store')->name('admin.order.store');
            Route::get('/order/{id}/edit', 'update')->name('admin.order.update');
            Route::put('/order/edit', 'cancle')->name('admin.order.cancle');
            Route::get('/order/{id}/generate', 'viewinvoice')->name('admin.invoice.view');
            Route::get('/order/{id}/mail', 'sendmail')->name('admin.invoice.mail');
            Route::get('/order/{id}/download', 'downloadinvoice')->name('admin.invoice.download');
        });
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'index')->name('admin.category.list');
        Route::get('/category/create', 'create')->name('admin.category.create');
        Route::post('/category/create', 'store')->name('admin.category.store');
        Route::get('/category/{id}/edit', 'edit')->name('admin.category.edit');
        Route::post('/category/{id}/edit', 'update')->name('admin.category.update');
        Route::delete('/category/{id}', 'destroy')->name('admin.category.delete');
    });

    Route::controller(BrandController::class)->group(function () {
        Route::get('/brand', 'index')->name('admin.brand.list');
        Route::get('/brand/create', 'create')->name('admin.brand.create');
        Route::post('/brand/create', 'store')->name('admin.brand.store');
        Route::get('/brand/{id}/edit', 'edit')->name('admin.brand.edit');
        Route::put('/brand/{id}/edit', 'update')->name('admin.brand.update');
        Route::delete('/brand/{id}', 'destroy')->name('admin.brand.delete');
    });
    Route::controller(SubCategoryController::class)->group(function () {
        Route::get('/subcategory', 'index')->name('admin.subcategory.list');
        Route::get('/subcategory/create', 'create')->name('admin.subcategory.create');
        Route::post('/subcategory/create', 'store')->name('admin.subcategory.store');
        Route::get('/subcategory/{id}/edit', 'edit')->name('admin.subcategory.edit');
        Route::put('/subcategory/{id}/edit', 'update')->name('admin.subcategory.update');
        Route::delete('/subcategory/{id}', 'destroy')->name('admin.subcategory.delete');
    });
    Route::controller(ProductController::class)->group(function () {
        Route::get('/product', 'index')->name('admin.product.list');
        Route::get('/product/create', 'create')->name('admin.product.create');
        Route::post('/product/create', 'store')->name('admin.product.store');
        Route::get('/product/{id}/edit', 'edit')->name('admin.product.edit');
        Route::put('/product/{id}/edit', 'update')->name('admin.product.update');
        Route::delete('/product/{id}', 'destroy')->name('admin.product.delete');
    });
    Route::controller(ProductImageController::class)->group(function () {
        Route::get('/images/{id}', 'destroy')->name('admin.images.delete');
    });
    //CRUD Color
    Route::controller(ColorController::class)->group(function () {
        Route::get('/color', 'index')->name('admin.color.list');
        Route::get('/color/create', 'create')->name('admin.color.create');
        Route::post('/color/create', 'store')->name('admin.color.store');
        Route::get('/color/{id}/edit', 'edit')->name('admin.color.edit');
        Route::put('/color/{id}/edit', 'update')->name('admin.color.update');
        Route::delete('/color/{id}', 'destroy')->name('admin.color.delete');
    });
    Route::controller(ProductColorController::class)->group(function () {
        Route::get('/productcolor', 'index')->name('admin.p.color.list');
        Route::get('/productcolor/create', 'create')->name('admin.p.color.create');
        Route::post('/productcolor/create', 'store')->name('admin.p.color.store');
        Route::get('/productcolor/{id}/edit', 'edit')->name('admin.p.color.edit');
        Route::post('/productcolor/{id}/edit', 'update')->name('admin.p.color.update');
        Route::delete('/productcolor/{id}', 'destroy')->name('admin.p.color.delete');
    });
    Route::controller(SliderController::class)->group(function () {
        Route::get('/slider', 'index')->name('admin.slider.list');
        Route::get('/slider/create', 'create')->name('admin.slider.create');
        Route::post('/slider/create', 'store')->name('admin.slider.store');
        Route::get('/slider/{id}/edit', 'edit')->name('admin.slider.edit');
        Route::post('/slider/{id}/edit', 'update')->name('admin.slider.update');
        Route::delete('/slider/{id}', 'destroy')->name('admin.slider.delete');
    });

    // Route::controller()->group(function() {
    //     Route::get('/subcategory')->name('admin.subcategory.list');
    //     Route::get('/category/create', 'create')->name('admin.category.create');
    //     Route::post('/category/create', 'store')->name('admin.category.store');
    //     Route::get('/category/{id}/edit', 'edit')->name('admin.category.edit');
    //     Route::post('/category/{id}/edit', 'update')->name('admin.category.update');
    //     Route::delete('/category/{id}', 'destroy')->name('admin.category.delete');
    // });
});

Route::prefix('shop')->group(function () {
    Route::controller(ShopController::class)->group(function () {
        Route::get('/', 'index')->name('fe.shop');
    });
});

Route::post('/update-pcolor', function () {
    $id = request()->id;
    $qty = request()->qty;

    $data = [
        'id' => $id,
        'qty' => $qty,
    ];
    $pcolor = ProductColor::find($id);
    $pcolor->update([
        'quantity' => $qty,
    ]);

    return response()->json('Product Color Updated!', 200);
});
Route::delete('/delete-pcolor', function () {
    $id = request()->id;
    ProductColor::destroy($id);

    return response()->json('Product Delete Updated!', 200);
});

Route::controller(OrderController::class)->group(function () {
    Route::get('/order', 'index')->name('frontend.order.list');
    Route::get('/order/{id}/detail', 'show')->name('frontend.order.show');
    Route::post('/order/add', 'store')->name('frontend.order.store');
    Route::put('/order/edit', 'update')->name('frontend.order.update');
    Route::get('/order/{id}', 'destroy')->name('frontend.order.delete');
});
Route::controller(CheckoutController::class)->group(function () {
    Route::get('/checkout', 'index')->name('admin.checkout');
    Route::post('/checkout/create', 'store')->name('admin.checkout.store');
    Route::get('/checkout/{id}/edit', 'edit')->name('admin.checkout.edit');
    Route::post('/checkout/{id}/edit', 'update')->name('admin.checkout.update');
    Route::delete('/checkout/{id}', 'destroy')->name('admin.checkout.delete');
});
Route::controller(WishlistController::class)->group(function () {
    Route::get('/wishlist', 'index')->name('admin.wishlist.list');
    Route::get('/wishlist/create', 'create')->name('admin.wishlist.create');
    Route::post('/wishlist/create', 'store')->name('admin.wishlist.store');

    Route::delete('/wishlist/{id}', 'destroy')->name('admin.wishlist.delete');
});
Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'index')->name('admin.cart.list');
    Route::post('/cart/add', 'store')->name('admin.wishlist.store');
    Route::put('/cart/edit', 'update')->name('admin.cart.update');
    Route::get('/cart/{id}', 'destroy')->name('admin.cart.delete');
});
// Route::controller(CartController::class)->group(function () {
//     Route::get('/cart', 'index')->name('admin.cart.list');
//     Route::post('/cart/add', 'store')->name('admin.wishlist.store');
//     Route::put('/cart/edit', 'update')->name('admin.cart.update');
//     Route::get('/cart/{id}', 'destroy')->name('admin.cart.delete');
// });

///// Frontend Routing
Route::get('/', [FrontendController::class, 'index'])->name('home');
// show all categories and category's sub categories
Route::get('/category/{category_slug}', [FrontendController::class, 'showCategories'])->name('frontend.category.list');
Route::get('/checkpayment', [FrontendController::class, 'checkpayment'])->name('frontend.category.checkpayment');
Route::get('/category/{category_slug}/{sub_slug}', [FrontendController::class, 'showCategoryProducts'])->name('frontend.category.products');
Route::get('/{product_slug}', [FrontendController::class, 'showSingleProduct'])->name('frontend.category.show');