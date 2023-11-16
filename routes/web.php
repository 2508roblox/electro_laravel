<?php

use App\Models\Product;
use App\Models\ProductColor;
use App\Livewire\Admin\Brand\Index;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\FileManagerController;
use App\Http\Controllers\Admin\TaskManagerController;
use App\Http\Controllers\Admin\InBoxManagerController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductColorController;
use App\Http\Controllers\Admin\GitActivityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\ProductRatingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
*/
// access for guest
Route::group(['prefix' => 'auth'], function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('/login', [LoginController::class, 'index'])->name('login');
        Route::post('/login', [LoginController::class, 'login'])->name('login.post');
        Route::get('/register', [RegisterController::class, 'index'])->name('register');
        Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
    });
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});

Route::group(['prefix' => 'my-account'], function () {
    Route::get('/', [MyAccountController::class, 'index'])
        ->name('frontend.myaccount.dashboard')
        ->middleware(['auth']);
    Route::controller(MyAccountController::class)->group(function () {
        Route::get('/order', 'order')->name('frontend.myaccount.order');
        Route::get('/address', 'address')->name('frontend.myaccount.address');
        Route::get('/account-detail', 'accountdetail')->name('frontend.myaccount.accountdetail');
        Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
    });
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
    Route::controller(CouponController::class)->group(function () {
        Route::get('/coupon', 'index')->name('admin.coupon.list');
        Route::get('/coupon/checkdiscount', 'checkdiscount')->name('admin.coupon.checkdiscount');
        Route::get('/coupon/create', 'create')->name('admin.coupon.create');
        Route::post('/coupon/create', 'store')->name('admin.coupon.store');
        Route::get('/coupon/{id}/edit', 'edit')->name('admin.coupon.edit');
        Route::post('/coupon/{id}/edit', 'update')->name('admin.coupon.update');
        Route::delete('/coupon/{id}', 'destroy')->name('admin.coupon.delete');
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
        Route::put('/brand/{id}/update', 'update')->name('admin.brand.update');
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
    // User
    Route::controller(UserController::class)->group(function () {
        Route::get('/user', 'index')->name('admin.user.list');
        Route::get('/user/create', 'create')->name('admin.user.create');
        Route::post('/user/create', 'store')->name('admin.user.store');
        Route::get('/user/{id}/edit', 'edit')->name('admin.user.edit');
        Route::put('/user/{id}/update', 'update')->name('admin.user.update');
        Route::delete('/user/{id}', 'destroy')->name('admin.user.delete');
    });
    Route::controller(ChatController::class)->group(function () {
        Route::get('/chat', 'index')->name('admin.chat');
    });
    Route::controller(FileManagerController::class)->group(function () {
        Route::get('/file-manager', 'index')->name('admin.file-manager');
        Route::get('/file-manager/slide', 'slide')->name('admin.file-manager.slide');
        Route::get('/file-manager/blog', 'blog')->name('admin.file-manager.blog');
        Route::get('/file-manager/subcategory', 'subcategory')->name('admin.file-manager.subcategory');
    });
    Route::controller(InBoxManagerController::class)->group(function () {
        Route::get('/inbox', 'index')->name('admin.inbox');
        Route::get('/inbox/invoice', 'invoice')->name('admin.inbox.invoice');
        Route::get('/inbox/invoice/{id}', 'detail_invoice')->name('admin.inbox.invoice.detail');
        Route::get('/inbox/{id}', 'detail_verify')->name('admin.inbox.id');
    });
    Route::controller(TaskManagerController::class)->group(function () {
        Route::get('/task-manager', 'index')->name('admin.task-manager');
    });
    Route::controller(GitActivityController::class)->group(function () {
        Route::get('/branch-master', 'master')->name('admin.git-activity.master');
        Route::get('/branch-giang', 'giang')->name('admin.git-activity.giang');
        Route::get('/branch-hoang', 'hoang')->name('admin.git-activity.hoang');
        Route::get('/branch-tai', 'tai')->name('admin.git-activity.tai');
    });
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

Route::controller(OtpController::class)->group(function () {
    Route::get('/verify-email', 'index')->name('frontend.otp.view');
    Route::post('/verify-email', 'store')->name('frontend.otp.store');
});
// product rating routes
Route::controller(ProductRatingController::class)->group(function () {
    Route::post('/product-rating', 'rating')->middleware(['auth', 'verifiedMail'])->name('frontend.product.rating');

});
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'index')->name('frontend.contact.view');
    Route::post('/contact', 'store')->name('frontend.contact.store');
});
Route::controller(OrderController::class)->group(function () {
    Route::get('/order', 'index')->middleware(['auth', 'verifiedMail'])->name('frontend.order.list');
    Route::get('/order/{id}/detail', 'show')->name('frontend.order.show');
    Route::post('/order/add', 'store')->middleware(['auth', 'verifiedMail'])->name('frontend.order.store');
    Route::put('/order/edit', 'update')->middleware(['auth', 'verifiedMail'])->name('frontend.order.update');
    Route::get('/order/{id}', 'destroy')->middleware(['auth', 'verifiedMail'])->name('frontend.order.delete');
});
Route::controller(CheckoutController::class)->group(function () {
    Route::get('/checkout', 'index')->name('admin.checkout');

    Route::post('/checkout/create', 'store')->middleware(['auth', 'verifiedMail'])->name('admin.checkout.store');
    Route::get('/checkout/{id}/edit', 'edit')->middleware(['auth', 'verifiedMail'])->name('admin.checkout.edit');
    Route::post('/checkout/{id}/edit', 'update')->middleware(['auth', 'verifiedMail'])->name('admin.checkout.update');
    Route::delete('/checkout/{id}', 'destroy')->middleware(['auth', 'verifiedMail'])->name('admin.checkout.delete');
});
// reset password by link generation
Route::controller(ForgotPasswordController::class)->group(function () {
    Route::get('/forgot-password', 'index')->name('frontend.forgot.view');
    // check if account email is exist
    Route::post('/forgot-password', 'handle')->name('frontend.forgot.handle');
    Route::get('/reset-password', 'reset')->name('frontend.forgot.reset');
    Route::post('/reset-password', 'store')->name('frontend.forgot.store');
});

Route::controller(WishlistController::class)->group(function () {
    Route::get('/wishlist', 'index')->middleware(['auth', 'verifiedMail'])->name('frontend.wishlist.list');
    Route::get('/wishlist/create', 'create')->middleware(['auth', 'verifiedMail'])->name('frontend.wishlist.create');
    Route::post('/wishlist/create', 'store')->middleware(['auth', 'verifiedMail'])->name('frontend.wishlist.store');

    Route::delete('/wishlist/{id}', 'destroy')->middleware(['auth'])->name('frontend.wishlist.delete');
});
Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'index')->middleware(['auth', 'verifiedMail'])->name('admin.cart.list');
    Route::post('/cart/add', 'store')->middleware(['auth', 'verifiedMail'])->name('admin.wishlist.store');
    Route::put('/cart/edit', 'update')->middleware(['auth', 'verifiedMail'])->name('admin.cart.update');
    Route::get('/cart/{id}', 'destroy')->middleware(['auth', 'verifiedMail'])->name('admin.cart.delete');
});
// Route::controller(CartController::class)->group(function () {
//     Route::get('/cart', 'index')->name('admin.cart.list');
//     Route::post('/cart/add', 'store')->name('admin.wishlist.store');
//     Route::put('/cart/edit', 'update')->name('admin.cart.update');
//     Route::get('/cart/{id}', 'destroy')->name('admin.cart.delete');
// });

// Blog
Route::prefix('blog')->group(function () {
    Route::controller(BlogController::class)->group(function () {
        Route::get('/', 'index')->name('fe.blog');
        Route::get('/post/{id}', 'post')->name('fe.post');
    });
});
///// Frontend Routing
Route::get('/wallet', [FrontendController::class, 'wallet'])->middleware(['auth'])->name('frontend.wallet');
Route::post('/wallet/create', [FrontendController::class, 'wallet'])->middleware(['auth'])->name('frontend.wallet.store');
Route::get('/transaction', [FrontendController::class, 'transaction'])->middleware(['auth'])->name('frontend.transaction');
Route::post('/transaction/create', [FrontendController::class, 'createTransaction'])->middleware(['auth'])->name('frontend.transaction.store');
Route::get('/checkdeposit', [FrontendController::class, 'checkdeposit'])->middleware(['auth'])->name('frontend.transaction.checkdeposit');
// wallet
Route::get('/', [FrontendController::class, 'index'])->name('home');
// show all categories and category's sub categories
Route::get('/category/{category_slug}', [FrontendController::class, 'showCategories'])->name('frontend.category.list');
Route::get('/checkpayment', [FrontendController::class, 'checkpayment'])->name('frontend.category.checkpayment');
Route::get('/category/{category_slug}/{sub_slug}', [FrontendController::class, 'showCategoryProducts'])->name('frontend.category.products');
Route::get('/{product_slug}', [FrontendController::class, 'showSingleProduct'])->name('frontend.category.show');
