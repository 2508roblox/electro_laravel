<?php

use App\Models\Product;
use App\Models\ProductColor;
use App\Livewire\Admin\Brand\Index;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

use Laravel\Socialite\Facades\Socialite;

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\FaceBookController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\LoginHistoryController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ProductRatingController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\ComingSoonController;
use App\Http\Controllers\AboutUsController;

use App\Http\Controllers\Auth\LogoutController;

use App\Http\Controllers\Admin\VariantController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\DesignDatabase;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DocumentDatabase;
use App\Http\Controllers\Admin\GithubController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ChatGptController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DatabaseController;
use App\Http\Controllers\Admin\BlogAdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\InfomationController;
use App\Http\Controllers\Admin\FileManagerController;
use App\Http\Controllers\Admin\GitActivityController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\TaskManagerController;
use App\Http\Controllers\Admin\InBoxManagerController;
use App\Http\Controllers\Admin\ProductColorController;
use App\Http\Controllers\Admin\VariantValueController;
use App\Http\Controllers\Admin\SkuController;
use App\Http\Controllers\Admin\NewsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
*/
Route::get('/', [FrontendController::class, 'index'])->middleware(['localization'])->name('home');


Route::get('change-language/{language}', function (string $language) {
    if (!in_array($language, ['en', 'es', 'vi'])) {
        abort(400);
    }
    Session::put('my_locale', $language);
    return redirect()->back();
})->name('change-language');

// Route::get('/coming-soon', [ComingSoonController::class, 'index'])->name('coming-soon');
// Route::post('/toggle-maintenance', [ComingSoonController::class, 'toggleMaintenanceMode'])->name('toggle-maintenance');

Route::post('/variants/value/create', [VariantValueController::class, 'create']);


Route::controller(SkuController::class)->group(function () {
    Route::get('/skus', 'index')->name('admin.sku.list');
    Route::post('/skus/create', 'store')->name('admin.sku.store');
    Route::post('/skus/update', 'update')->name('admin.sku.update');
    Route::post('/skus/delete/{id}', 'delete')->name('admin.sku.delete');
});



// access for guest
Route::group(['prefix' => 'auth'], function () {
    Route::middleware(['guest', 'localization'])->group(function () {
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
    Route::get('/user-comments', [MyAccountController::class, 'userComments'])
        ->name('frontend.myaccount.userComments')
        ->middleware(['auth']);
    Route::controller(MyAccountController::class)->group(function () {


        Route::get('/order', 'order')->name('frontend.myaccount.order');
        Route::get('/address', 'address')->name('frontend.myaccount.address');
        Route::get('/account-detail', 'accountdetail')->name('frontend.myaccount.accountdetail');
        Route::post('/update-profile', [MyAccountController::class, 'updateProfile'])->name('frontend.myaccount.updateProfile');
    });
    // Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});
Route::get('/login-history', [LoginHistoryController::class, 'index'])->name('login.history');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard')
        ->middleware(['auth', 'isAdmin']);
    Route::controller(VariantController::class)->group(function () {
        Route::get('/variants', 'index')->name('admin.variants.list');
        Route::get('/variants/create', 'create')->name('admin.variants.create');
        Route::post('/variants/create', 'store')->name('admin.variants.store');
        Route::get('/variants/{id}/edit', 'edit')->name('admin.variants.edit');
        Route::post('/variants/{id}/edit', 'update')->name('admin.variants.update');
        Route::delete('/variants/{id}', 'destroy')->name('admin.variants.delete');
    });
    Route::controller(AdminOrderController::class)->group(function () {
        Route::get('/order', 'index')->name('admin.order.list');
        Route::get('/order/{id}/detail', 'show')->name('admin.order.show');
        Route::post('/order/add', 'store')->name('admin.order.store');
        Route::get('/order/{id}/edit', 'update')->name('admin.order.update');
        Route::get('/order/{id}/delivery', 'delivery')->name('admin.order.delivery');
        Route::get('/order/{id}/received', 'received')->name('admin.order.received');
        Route::put('/order/edit', 'cancel')->name('admin.order.cancel');
        Route::get('/order/{id}/cancel', 'clientCancel')->name('admin.order.client.cancel');
        Route::get('/order/{id}/refund', 'clientRefund')->name('admin.order.client.refund');
        Route::get('/order/{id}/generate', 'viewinvoice')->name('admin.invoice.view');
        Route::get('/order/{id}/mail', 'sendmail')->name('admin.invoice.mail');
        Route::get('/order/{id}/download', 'downloadinvoice')->name('admin.invoice.download');
    });
    Route::controller(UserController::class)->group(function () {
        Route::get('/activity-user', 'index2')->name('admin.activity-user.login');
        Route::get('/activity-user/create', 'create')->name('admin.activity-user.create');
        Route::post('/activity-user/create', 'store')->name('admin.activity-user.store');
        Route::get('/activity-user/{id}/edit', 'edit')->name('admin.activity-user.edit');
        Route::put('/activity-user/{id}/update', 'update')->name('admin.activity-user.update');
        Route::delete('/activity-user/{id}', 'destroy')->name('admin.activity-user.delete');
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
    Route::controller(BlogAdminController::class)->group(function () {
        Route::get('/blog', 'index')->name('admin.blog');
        Route::get('/blog/comment', 'showComment')->name('admin.blog.comment');
        Route::get('/blog/comment/edit/{id}', 'editComment')->name('admin.blog.comment.edit');
        Route::put('/blog/comment/edit/{id}', 'updateComment')->name('admin.blog.comment.update');
        Route::delete('/blog/comment/{id}', 'destroy')->name('admin.blog.comment.delete');
        Route::delete('/blog/{id}', 'destroy')->name('admin.blog.delete');
        Route::post('/blog/create', 'store')->name('admin.blog.store');
        Route::get('/blog/create', 'create')->name('admin.blog.create');
        Route::get('/blog/get-post', [BlogAdminController::class, 'getAndStorePost'])->name('admin.blog.get-post');
        Route::get('/blog/{id}/edit', 'edit')->name('admin.blog.edit');
        Route::put('/blog/{id}/update', 'update')->name('admin.blog.update');
        // Route::delete('/blog/{id}', 'destroy')->name('admin.blog');
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
    Route::controller(DatabaseController::class)->group(function () {
        Route::get('/database', 'index')->name('admin.database');
        Route::get('/database/{id}', 'detail')->name('admin.database.detail');
    });
    Route::controller(ChatGptController::class)->group(function () {
        Route::get('/chatgpt', 'index')->name('admin.chatgpt');
    });
    Route::controller(DesignDatabase::class)->group(function () {
        Route::get('/design-database', 'index')->name('admin.design.database');
        Route::get('/design-usecase', 'usecase')->name('admin.design.usecase');
    });
    Route::controller(DocumentDatabase::class)->group(function () {
        Route::get('/sheet', 'sheet')->name('admin.document.sheet');
        Route::get('/word', 'word')->name('admin.document.word');
    });
    Route::controller(GithubController::class)->group(function () {
        Route::get('/github', 'index')->name('admin.github');
        Route::get('/github/2508roblox', 'a2508roblox')->name('admin.github.2508roblox');
        Route::get('/github/tranlehuyhoang', 'tranlehuyhoang')->name('admin.github.tranlehuyhoang');
        Route::get('/github/huutai2312', 'huutai2312')->name('admin.github.huutai2312');
    });
    Route::controller(InfomationController::class)->group(function () {
        Route::get('/infomation/soucer', 'index')->name('admin.infomation.soucer');
        Route::get('/infomation/function', 'function')->name('admin.infomation.function');
        Route::get('/infomation/technology', 'technology')->name('admin.infomation.technology');
        Route::get('/infomation/assignment', 'assignment')->name('admin.infomation.assignment');
    });
});
// 2.0 auth


Route::prefix('google')->name('google.')->group(function () {
    Route::get('auth', [GoogleController::class, 'loginUsingGoogle'])->name('login');
    Route::get('callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
});
Route::prefix('facebook')->name('facebook.')->group(function () {
    Route::get('auth', [FaceBookController::class, 'loginUsingFacebook'])->name('login');
    Route::get('callback', [FaceBookController::class, 'callbackFromFacebook'])->name('callback');
});

Route::prefix('shop')->group(function () {
    Route::controller(ShopController::class)->group(function () {
        Route::get('/', 'index')->middleware(['localization'])->name('fe.shop');
    });
});
Route::prefix('search')->group(function () {
    Route::controller(ShopController::class)->group(function () {
        Route::get('/', 'search')->middleware(['localization'])->name('fe.search');
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
    Route::get('/verify-email', 'index')->middleware(['localization'])->name('frontend.otp.view');
    Route::post('/verify-email', 'store')->middleware(['localization'])->name('frontend.otp.store');
});
// product rating routes
Route::controller(ProductRatingController::class)->group(function () {
    Route::post('/product-rating', 'rating')->middleware(['auth', 'verifiedMail'])->name('frontend.product.rating');
});
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'index')->middleware(['localization'])->name('frontend.contact.view');
    Route::post('/contact', 'store')->middleware(['localization'])->name('frontend.contact.store');
});
Route::controller(OrderController::class)->group(function () {
    Route::get('/order', 'index')->middleware(['auth', 'verifiedMail', 'localization'])->name('frontend.order.list');
    Route::get('/order/{id}/detail', 'show')->name('frontend.order.show');
    Route::post('/order/add', 'store')->middleware(['auth', 'verifiedMail', 'localization'])->name('frontend.order.store');
    Route::put('/order/edit', 'update')->middleware(['auth', 'verifiedMail', 'localization'])->name('frontend.order.update');
    Route::get('/order/{id}', 'destroy')->middleware(['auth', 'verifiedMail', 'localization'])->name('frontend.order.delete');
});
Route::controller(CheckoutController::class)->group(function () {
    Route::get('/checkout', 'index')->middleware(['localization'])->name('admin.checkout');
    Route::get('/checkout/{id}/pay', 'index')->middleware(['localization'])->name('admin.checkout');

    Route::post('/checkout/create', 'store')->middleware(['auth', 'verifiedMail', 'localization'])->name('admin.checkout.store');
    Route::get('/checkout/{id}/pay', 'pay')->middleware(['auth', 'verifiedMail', 'localization'])->name('admin.checkout.pay');
    Route::post('/checkout/{id}/edit', 'update')->middleware(['auth', 'verifiedMail', 'localization'])->name('admin.checkout.update');
    Route::delete('/checkout/{id}', 'destroy')->middleware(['auth', 'verifiedMail', 'localization'])->name('admin.checkout.delete');
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
    Route::get('/cart', 'index')->middleware(['auth', 'verifiedMail', 'localization'])->name('admin.cart.list');
    Route::post('/cart/add', 'store')->middleware(['auth', 'verifiedMail', 'localization'])->name('admin.wishlist.store');
    Route::put('/cart/edit', 'update')->middleware(['auth', 'verifiedMail', 'localization'])->name('admin.cart.update');
    Route::get('/cart/{id}', 'destroy')->middleware(['auth', 'verifiedMail', 'localization'])->name('admin.cart.delete');
});
// Route::controller(CartController::class)->group(function () {
//     Route::get('/cart', 'index')->name('admin.cart.list');
//     Route::post('/cart/add', 'store')->name('admin.wishlist.store');F
//     Route::put('/cart/edit', 'update')->name('admin.cart.update');
//     Route::get('/cart/{id}', 'destroy')->name('admin.cart.delete');
// });

// Blog
Route::prefix('blog')->group(function () {
    Route::controller(BlogController::class)->group(function () {
        Route::get('/', 'index')->name('fe.blog');
        Route::get('/post/{id}', 'post')->name('fe.post');
        Route::get('/report-comment/{commentId}', 'reportComment')->name('reportComment');
        Route::post('/store-comment/{blogId}', 'storeComment')->name('storeComment');
        Route::get('/hide-comment/{commentId}', 'hideComment')->name('hideComment');
        Route::get('/show-comment/{commentId}', 'showComment')->name('showComment');
        Route::get('/delete-comment/{commentId}', 'deleteComment')->name('deleteComment');
    });
});
///// Frontend Routing
Route::get('/wallet', [FrontendController::class, 'wallet'])->middleware(['auth'])->name('frontend.wallet');
Route::post('/wallet/create', [FrontendController::class, 'wallet'])->middleware(['auth'])->name('frontend.wallet.store');
Route::get('/transaction', [FrontendController::class, 'transaction'])->middleware(['auth'])->name('frontend.transaction');
Route::post('/transaction/create', [FrontendController::class, 'createTransaction'])->middleware(['auth'])->name('frontend.transaction.store');
Route::get('/checkdeposit', [FrontendController::class, 'checkdeposit'])->middleware(['auth'])->name('frontend.transaction.checkdeposit');

Route::get('/about-us', [AboutUsController::class, 'index'])->name('frontend.about');
// wallet
// show all categories and category's sub categories
Route::get('/category/{category_slug}', [FrontendController::class, 'showCategories'])->middleware(['localization'])->name('frontend.category.list');
Route::get('/checkpayment', [FrontendController::class, 'checkpayment'])->middleware(['localization'])->name('frontend.category.checkpayment');
Route::get('/category/{category_slug}/{sub_slug}', [FrontendController::class, 'showCategoryProducts'])->middleware(['localization'])->name('frontend.category.products');
Route::get('/{product_slug}', [FrontendController::class, 'showSingleProduct'])->middleware(['localization'])->name('frontend.category.show');
