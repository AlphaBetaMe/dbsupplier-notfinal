<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\PosController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Frontend\FrontendController;

use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\PersonController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\Admin\SalesController;
//auth
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactUsController;


Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('storage:link');
    $exitCode = Artisan::call('key:generate');


    return 'DONE'; //Return anything
});

require __DIR__ . '/auth.php';

Auth::routes([
    'verify' => true,
]);

Route::post('/update-cart', 'App\Http\Controllers\Frontend\CartController@checkedCart')->name('update.cart');

// Route::resource('/frontend/contactus', [App\Http\Controllers\ContactUsController::class])->only(['store']);
Route::post('/frontend/contactus', [App\Http\Controllers\ContactUsController::class, 'store'])->name('contact.store');


Route::post('/comments/{timeline}', 'App\Http\Controllers\CommentController@store')->name('comments.store');

Route::match(['get', 'post'], '/botman', [App\Http\Controllers\BotManController::class, 'handle']);

Route::get('/attendance', [App\Http\Controllers\AttendanceLogController::class, 'index'])->name('attendance');
Route::post('/attendance/time-in', [App\Http\Controllers\AttendanceLogController::class, 'timeIn'])->name('time-in');
Route::put('/attendance/time-out/{attendance}', [App\Http\Controllers\AttendanceLogController::class, 'timeOut'])->name('time-out');

Route::get('/category/search', [App\Http\Controllers\Admin\CategoryController::class, 'search'])->name('category.search');
Route::get('/products/search', [App\Http\Controllers\Admin\ProductController::class, 'search'])->name('products.search');
Route::get('/orders/search', [App\Http\Controllers\Admin\OrderController::class, 'search'])->name('orders.search');

Route::post('/cancel-order', [CheckoutController::class, 'cancelOrder'])->name('cancel.order');

Route::get('/attendance/monthly', [App\Http\Controllers\AttendanceLogController::class, 'viewByMonth'])->name('attendance.monthly');
Route::get('/salary/monthly', [App\Http\Controllers\SalaryController::class, 'userviewByMonth'])->name('salary.monthly');
Route::get('/salary/print', [App\Http\Controllers\SalaryController::class, 'print'])->name('salary.print');
Route::post('/salary/calculate', [App\Http\Controllers\SalaryController::class, 'calculateSalary'])->name('salary.calculate');
Route::middleware(['auth'])->group(function () {
    Route::get('cart', [App\Http\Controllers\Frontend\Cartcontroller::class, 'viewCart'])->middleware('verified');
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::post('placeOrder-details', [CheckoutController::class, 'placeOrder']);
    Route::post('placeOrder-details-gcash', [CheckoutController::class, 'placeOrderGcash']);
    Route::post('placeOrder-details-bpi', [CheckoutController::class, 'placeOrderBpi']);

    Route::get('myOrders', [App\Http\Controllers\Frontend\PersonController::class, 'index'])->middleware('verified');
    Route::get('viewOrder/{id}', [App\Http\Controllers\Frontend\PersonController::class, 'view']);
    Route::put('viewOrder/{id}', [App\Http\Controllers\Frontend\PersonController::class, 'cancelOrder'])->name('cancelOrder');

    Route::get('users/userProfile', [App\Http\Controllers\ProfileController::class, 'index'])->name('users.userProfile')->middleware('verified');
    Route::get('users/employee', [App\Http\Controllers\UserController::class, 'employee'])->name('users.employee');
    Route::get('users/userupdatePassword/{id}', [App\Http\Controllers\ProfileController::class, 'edit'])->name('users.userupdatePassword');
    Route::put('users/userProfile/{id}', [App\Http\Controllers\ProfileController::class, 'update'])->name('user.updateuserProfile');
    // Route::get('users/myprofile/{id}', [App\Http\Controllers\ProfileController::class, 'editprofile'])->name('users.myProfile');
    Route::get('admin/users/myprofile/{id}', [App\Http\Controllers\ProfileController::class, 'editprofile'])->name('users.myProfile');
    Route::put('users/myprofile/{id}', [App\Http\Controllers\ProfileController::class, 'updateprofile'])->name('users.updatemyProfile');
    Route::put('users/userupdatePassword/{id}', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('users.userupdatePass');


    // Route::post('proceed-payment', [CheckoutController::class, 'razorPay']);
    // Route::post('proceed-gcashpayment', [CheckoutController::class, 'gcashPay']);

    // Route::get('admin/products', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('products.index');
    // Route::get('admin/products/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('products.create');
    // Route::post('admin/products/create', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('products.store');
    // Route::get('admin/products/edit/{id}', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('products.edit');
    // Route::put('admin/product/update/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('products.update');
    // Route::get('admin/product/destroy/{id}',[App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('supplier/products', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('products.index');
    Route::get('supplier/products/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('products.create');
    Route::post('supplier/products/create', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('products.store');
    Route::get('supplier/products/edit/{id}', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('products.edit');
    Route::put('supplier/product/update/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('products.update');
    Route::get('supplier/product/destroy/{id}', [App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('products.destroy');


    Route::get('admin/viewOrder/{id}', [App\Http\Controllers\Admin\OrderController::class, 'view']);
    Route::put('update-OrderStatus/{id}', [App\Http\Controllers\Admin\OrderController::class, 'updateOrder']);
    Route::get('order-history', [App\Http\Controllers\Admin\OrderController::class, 'orderHistory']);

    Route::resource('update-password', 'App\Http\Controllers\SettingController');
    // Route::patch('update-password/{id}', [App\Http\Controllers\SettingController::class, 'update'])->name('update-password.update');
    Route::patch('update-password/{id}', [App\Http\Controllers\ProfileController::class, 'update'])->name('update-password.update');
    Route::get('admin/pos/transaction', [App\Http\Controllers\Admin\PosController::class, 'posTransaction'])->name('pos.transaction');
});

//Outside the middleware
Route::get('/', [FrontendController::class, 'index']);
Route::get('/category', [FrontendController::class, 'category'])->middleware('verified');
Route::get('/view-category/{slug}', [FrontendController::class, 'viewcategory'])->middleware('verified');
Route::get('/category/{cate_slug}/{prod_slug}', [FrontendController::class, 'productview'])->middleware('verified');


Route::post('add-to-cart', [App\Http\Controllers\Frontend\CartController::class, 'addProdCart']);
Route::post('add-to-cart-2', [App\Http\Controllers\Frontend\CartController::class, 'addProdCart2']);
Route::post('remove-cart-item', [App\Http\Controllers\Frontend\CartController::class, 'removeProduct']);
Route::post('update-Cart', [App\Http\Controllers\Frontend\CartController::class, 'updateCart']);

//barcode

Route::get('admin/products/printBarcode/{prod_code}', [ProductController::class, 'generateBarcode'])->name('products.printBarcode');
Route::get('/chart', [App\Http\Controllers\Admin\SalesController::class, 'generateChart'])->name('chart');
Route::get('/chartPos', [App\Http\Controllers\Admin\SalesController::class, 'generateChartPos'])->name('chartPos');

//myservices
Route::get('admin/products/myservices', [App\Http\Controllers\Admin\ProductController::class, 'myServices'])->name('products.myservices');

//search

Route::get('/supplierList', [FrontendController::class, 'filterSuppliers'])->name('frontend.supplierFilter');

Route::get('/', [FrontendController::class, 'index']);
// Route::middleware(['auth', 'isAdmin'])->group(function(){
//     Route::get('dashboard', function () {
//         return view('dashboard');


// });

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('admin/dashboard', [AdminDashboardController::class, 'index']);
});

Route::middleware(['auth', 'isSupplier'])->group(function () {
    Route::get('supplier/dashboard', [DashboardController::class, 'index']);
    // Route::get('supplier/dashboard', 'SupplierController@dashboard')->name('supplier.dashboard');
});




// Route::middleware(['auth', 'isAdmin'])->group(function () {
//     Route::get('dashboard', function () {
//         if (Auth::check() && Auth::user()->hasRole('Supplier')) {
//             return view('dashboard');
//         } elseif (Auth::check() && Auth::user()->hasRole('Admin')) {
//             return view('admin.index');
//         }
//     });
//   ///Products


//     // Route::get('frontend/gcash', function () {
//     //     return view('frontend/gcash');
//     // })->middleware(['auth'])->name('gcash');
//     // Route::get('frontend/failed', function () {
//     //     return view('frontend/failed');
//     // })->middleware(['auth'])->name('failed');
//     // Route::get('frontend/success', function () {
//     //     return view('frontend/success');
//     // })->middleware(['auth'])->name('success');

// });

Route::get('add-review/{product_slug}/userreview', [ReviewController::class, 'add']);

Route::post('add-review', [ReviewController::class, 'create']);

Route::get('admin/pos', [PosController::class, 'search']);
Route::group(['middleware' => ['auth']], function () {
    Route::resource('admin/manage-account/roles', 'App\Http\Controllers\RoleController');
    Route::resource('admin/manage-account/users', 'App\Http\Controllers\UserController');
    Route::resource('admin/manage-account/permissions', 'App\Http\Controllers\PermissionController');
    Route::resource('admin/logs', 'App\Http\Controllers\AuditController');

    Route::resource('projects', 'App\Http\Controllers\ProjectController');
    Route::resource('admin/category', 'App\Http\Controllers\Admin\CategoryController');
    Route::resource('admin/pos', 'App\Http\Controllers\Admin\PosController');
    Route::resource('admin/reports', 'App\Http\Controllers\Admin\SalesController');
    // Route::resource('paymentQR', 'App\Http\Controllers\PaymentQrController');
    Route::get('supplier/paymentQR', [App\Http\Controllers\PaymentQrController::class, 'index'])->name('paymentQR.index');
    Route::get('supplier/paymentQR/create-payment', [App\Http\Controllers\PaymentQrController::class, 'create'])->name('paymentQR.create');
    Route::post('supplier/paymentQR/create', [App\Http\Controllers\PaymentQrController::class, 'store'])->name('paymentQR.store');
    Route::get('supplier/paymentQR/edit/{id}', [App\Http\Controllers\PaymentQrController::class, 'edit'])->name('paymentQR.edit');
    Route::put('supplier/paymentQR/update/{id}', [App\Http\Controllers\PaymentQrController::class, 'update'])->name('paymentQR.update');
    Route::delete('supplier/paymentQR/destroy/{id}', [App\Http\Controllers\PaymentQrController::class, 'destroy'])->name('paymentQR.destroy');

    Route::resource('salary', 'App\Http\Controllers\SalaryController');
    // Route::resource('/dashboard','App\Http\Controllers\DashboardController');
    Route::resource('supplier/dashboard', 'App\Http\Controllers\DashboardController');
    Route::resource('admin/stocks', 'App\Http\Controllers\StockController');
    Route::resource('returns', 'App\Http\Controllers\ProductReturnController');
    // Route::resource('admin/orders','App\Http\Controllers\Admin\OrderController');
    Route::resource('supplier/orders', 'App\Http\Controllers\Admin\OrderController');
    Route::resource('admin/promos', 'App\Http\Controllers\PromoController');
    Route::resource('links', 'App\Http\Controllers\LinkController');


    // Route::resource('suppliers','App\Http\Controllers\SupplierController');
    Route::get('admin/suppliers', [SupplierController::class, 'index']);
    Route::get('admin/suppliers/edit/{id}', [SupplierController::class, 'edit']);
    Route::put('admin/suppliers/update/{id}', [SupplierController::class, 'update']);


    Route::resource('timelines', 'App\Http\Controllers\TimelineController');
    Route::resource('admin/events', 'App\Http\Controllers\EventController');
    // Route::resource('supplier/events','App\Http\Controllers\EventController');
    // Route::resource('admin/contacts','App\Http\Controllers\ContactUsController');
    Route::resource('supplier/contacts', 'App\Http\Controllers\ContactUsController');
    // Route::resource('admin/pos2', 'App\Http\Controllers\Admin\Pos2Controller');
});




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');


Route::get('/', [FrontendController::class, 'index']);
Route::get('frontend/supplier/{id}', [FrontendController::class, 'supplier'])->name('frontend.supplier');
Route::get('frontend/contact', [FrontendController::class, 'contact'])->name('frontend.contact');
Route::get('frontend/about', [FrontendController::class, 'about'])->name('frontend.about');
Route::get('frontend/supplierList', [FrontendController::class, 'supplierList'])->name('frontend.supplierList');
Route::get('frontend/registersupplier', [FrontendController::class, 'registerSupplier'])->name('frontend.registersupplier');
Route::post('frontend/registersupplier', [FrontendController::class, 'registerSupplierStore'])->name('frontend.registersupplierStore');

Route::get('orders', [App\Http\Controllers\Admin\OrderController::class, 'index']);

Route::get('cart', [App\Http\Controllers\Frontend\CartController::class, 'viewCart'])->name('cart');
Route::post('add-to-cart', [App\Http\Controllers\Frontend\CartController::class, 'addProdCart']);
Route::post('remove-cart-item', [App\Http\Controllers\Frontend\CartController::class, 'removeProduct']);
Route::post('update-Cart', [App\Http\Controllers\Frontend\CartController::class, 'updateCart']);
Route::delete('/cart/remove/{id}/{prod_id}', [App\Http\Controllers\Frontend\CartController::class, 'removeProduct'])->name('cart.remove');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
