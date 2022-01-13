<?php

use App\Http\Controllers\Admin\ConfigController;
// use App\Http\Controllers\Admin\JobCategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Need\AuthController;
use App\Http\Controllers\Need\BookingController;
use App\Http\Controllers\Need\HomeController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\VendorController;
use App\Models\JobCategory;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('test', 'test');

Route::name('resume.')->middleware('role:2|3')->prefix('resume')->group(function(){
    ROute::get('',[ResumeController::class,'index'])->name('index');
    ROute::post('save',[ResumeController::class,'save'])->name('save');
    ROute::post('data-add',[ResumeController::class,'dataAdd'])->name('data-add');
    ROute::post('data-del',[ResumeController::class,'dataDel'])->name('data-del');
});

route::name('n.front.')->group(function(){
    route::get('',[HomeController::class,"index"])->name('home');
    route::get('view-job/{job}',[HomeController::class,"viewJob"])->name('view-job');
    route::get('all-category',[HomeController::class,"allCategory"])->name('all-category');
    route::match(['GET','POST'],'job-category/{cat}',[HomeController::class,"JobCategory"])->name('job-category');
    route::post('message',[HomeController::class,"message"])->name('message');

    Route::middleware('role:2|3')->group(function(){
        Route::match(['GET','POST'],'apply-job/{job}',[HomeController::class,"applyJob"])->name('apply-job');
        Route::match(['GET','POST'],'apply-job-success/{job}',[HomeController::class,"applyJobSuccess"])->name('apply-job-success');

    });

    //authentication
    route::get('auth',[AuthController::class,"index"])->name('auth');
    route::match(['GET','POST'],'plogin',[AuthController::class,"login"])->name('login');
    route::match(['GET','POST'],'signup',[AuthController::class,"signup"])->name('signup');
    route::match(['GET','POST'],'check',[AuthController::class,"check"])->name('check');


    route::name('book.')->prefix("bike-service")->group(function(){

        route::match(['get','post'],'step1',[BookingController::class,"step1"])->name('step1');
        route::match(['get','post'],'step2',[BookingController::class,"step2"])->name('step2');
        route::match(['get','post'],'shop',[BookingController::class,"shop"])->name('shop');
        route::match(['get','post'],'addToCart',[BookingController::class,"addToCart"])->name('addToCart');
        route::match(['get','post'],'removeFromCart',[BookingController::class,"removeFromCart"])->name('removeFromCart');

    });

    Route::middleware(['role:2|3'])->group(function () {
        route::name('book.')->prefix("bike-service")->group(function(){
            route::match(['get','post'],'checkout',[BookingController::class,"checkout"])->name('checkout');
            route::match(['get','post'],'success',[BookingController::class,"success"])->name('success');
        });

        route::match(['get','post'],'postjob',[HomeController::class,"postjob"])->name('postjob');
        route::match(['get','post'],'postcv',[HomeController::class,"postcv"])->name('postcv');
        route::match(['get','post'],'delivery',[HomeController::class,"delivery"])->name('delivery');
        route::match(['get','post'],'subs',[HomeController::class,"subs"])->name('subs');
        route::get('logout',[AuthController::class,"logout"])->name('logout');

    });

    Route::middleware('role:2|3')->group(function(){
        route::get('user',[AuthController::class,'user'])->name('user');
        route::get('user-order/{order}',[AuthController::class,'order'])->name('user-order');
    });
    Route::prefix('user-dashboard')->name('vendor.')->middleware('role:2|3')->group(function(){
        route::get('',[VendorController::class,'index'])->name('index');
        Route::match(['GET','POST'],'change-image', [VendorController::class,'changeImage'])->name('change-image');
        Route::match(['GET','POST'],'manage-profile', [VendorController::class,'manageProfile'])->name('manage-profile');
        Route::match(['GET','POST'],'change-name', [VendorController::class,'changeName'])->name('change-name');
        Route::match(['GET','POST'],'change-desc', [VendorController::class,'changeDesc'])->name('change-desc');
        Route::get('deliveries',[VendorController::class,'deliveries'])->name('deliveries');
        Route::get('appliedJobs',[VendorController::class,'appliedJobs'])->name('appliedJobs');
        Route::get('orders',[VendorController::class,'orders'])->name('orders');
        Route::get('single-order/{order}',[VendorController::class,'singleOrder'])->name('single-order');
        Route::prefix('posted-job')->name('posted-job.')->group(function(){
            Route::get('',[VendorController::class,'jobs'])->name('index');
            Route::get('view/{job}',[VendorController::class,'jobView'])->name('view');
            Route::post('update/{job}',[VendorController::class,'jobUpdate'])->name('update');
            Route::match(['GET','POST'],'add', [VendorController::class,'addJob'])->name('add');
        });
    });
});


// newsletter
Route::post('add-email', 'NewsletterController@addEmail');



// Customer auth routes
Route::group(['middleware' => ['front']], function () {
    Route::match(['GET', 'POST'], 'my-profile', 'CustomerAuthController@customerProfile');
    Route::get('my-order', 'CustomerAuthController@customerOrder');
    Route::get('my-order/detail/{id}', 'CustomerAuthController@customerOrderDetail');
    Route::get('checkout', 'CustomerAuthController@checkout');
    Route::post('checkout', 'CustomerAuthController@placeOrderStore');
    Route::get('shipping-charge/{district}', 'CustomerAuthController@getShippingCharge');
    Route::post('customer-messages', 'CustomerAuthController@customerMessage');
    Route::get('remove-wishlist-item/{id}', 'CustomerAuthController@removeWishlistItem');
});


Route::match(['GET','POST'],'login','Auth\LoginController@login')->name('login');
Route::post('logout','Auth\LoginController@logout')->name('logout');


Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'role:1', 'prefix' => 'dashboard'],  function () {
    Route::name('admin.')->group(function(){
        Route::get('delivery/{type}', [UserController::class,'delivery'])->name('delivery');
        Route::post('deliveryComplete', [UserController::class,'deliveryComplete'])->name('deliveryComplete');
        Route::get('deliverySingle/{delivery}', [UserController::class,'deliverySingle'])->name('deliverySingle');

        Route::get('jobseeker', [UserController::class,'jobseeker'])->name('jobseeker');
        Route::get('jobseekerSingle/{jobseeker}', [UserController::class,'jobseekerSingle'])->name('jobseekerSingle');

        Route::get('job', [UserController::class,'job'])->name('job');
        Route::get('job-single/{job}', [UserController::class,'jobSingle'])->name('job-Single');

        Route::get('serviceOrder/{type}', [OrderController::class,'serviceOrder'])->name('serviceOrder');
        Route::post('serviceOrder-complete', [OrderController::class,'serviceOrderComplete'])->name('serviceOrderComplete');
        Route::get('serviceOrderSingle/{order}', [OrderController::class,'serviceOrderSingle'])->name('serviceOrderSingle');
        // Route::get('job-single/{job}', [UserController::class,'jobSingle'])->name('job-Single');

        //XXX manage configs
        Route::get('configs',[ConfigController::class,'index'])->name('configs');

        Route::post('configs/store',[ConfigController::class,'store'])->name('configs.store');

        Route::get('message', [UserController::class,'message'])->name('message');

        Route::name('subs.')->prefix('subs')->group(function(){
            route::get('',[SubscriptionController::class,'index'])->name('index');
            route::post('add',[SubscriptionController::class,'add'])->name('add');
            route::post('update',[SubscriptionController::class,'update'])->name('update');
            route::get('del/{sub}',[SubscriptionController::class,'del'])->name('del');
            route::get('user/{type}',[SubscriptionController::class,'user'])->name('user');
            route::post('user-del',[SubscriptionController::class,'user_del'])->name('user-del');
            route::post('user-accecpt',[SubscriptionController::class,'user_accecpt'])->name('user-accecpt');
        });

    });

    Route::get('/', 'Admin\AdminController@index')->name('dashboard');


    //  main attr
    Route::resource('color', 'Admin\ColorController');
    // sub attr
    Route::resource('size', 'Admin\SizeController');
    // main cat,
    Route::resource('maincat', 'Admin\MaincatController');
    // brand
    Route::resource('brand', 'Admin\BrandController');
    // product
    Route::resource('product', 'Admin\ProductController');
    //jobcateory
    Route::resource('job-category', 'Admin\JobCategoryController');
    // Product Gallery image delete
    Route::get('/image/delete/{image_id}/', 'Admin\ProductController@GalleryImageDelete')->name('gallery.image.delete');

    //   manage product stock
    Route::get('/manage/stock/{product_id}', 'Admin\StockController@manageStock')->name('manage.stock');
    Route::post('/manage/stock/{product_id}', 'Admin\StockController@manageStockStore');
    Route::post('/variant/stock/Add', 'Admin\StockController@VariantStock');

    //    coupon routes
    Route::resource('coupon', 'Admin\CouponController');

    // shipping route
    Route::resource('shipping', 'Admin\ShippingController');

    // order manage routes
    Route::get('/customer-pending-order', 'Admin\OrderController@pendingOrder');
    Route::get('/pending-order-detail/{id}', 'Admin\OrderController@pendingOrderDetail');
    Route::get('/customer-complete-order', 'Admin\OrderController@completeOrder');
    Route::get('/complete-order-detail/{id}', 'Admin\OrderController@completeOrderDetail');

    Route::post('/response-message', 'Admin\OrderController@responseMessage');

    // front setting route
    Route::get('banners', 'Admin\BannerController@index');
    Route::match(['GET', 'POST'], 'banner/edit/{id}', 'Admin\BannerController@topBanner');
    Route::match(['GET', 'POST'], 'about-info', 'Admin\FrontSettingController@aboutInfo');
    Route::match(['GET', 'POST'], 'terms-and-condition-info', 'Admin\FrontSettingController@termsAndConditionInfo');
    Route::resource('store', 'Admin\StoreController');
    Route::match(['GET', 'POST'], 'basic-info', 'Admin\FrontSettingController@basicInfo');
    Route::match(['GET', 'POST'], 'popup-info', 'Admin\FrontSettingController@popupBoxInfo');
    Route::match(['GET', 'POST'], 'footer-header', 'Admin\FrontSettingController@footerHead');
    Route::match(['GET', 'POST'], 'footer-extra-info', 'Admin\FrontSettingController@footerExtraInfo');
    Route::resource('footerlink', 'Admin\FooterlinkController');




    // slider route
    Route::resource('slider', 'Admin\SliderController');

    // customer info
    Route::get('customer-message', 'Admin\CustomerController@customerMessage');
    Route::get('seen-message/{id}', 'Admin\CustomerController@messageSeen');
    Route::get('customer-list', 'Admin\CustomerController@customerList');

    // setting routes
    Route::match(['GET', 'POST'], 'change-password', 'Admin\SettingController@changePassword');
    Route::match(['GET', 'POST'], 'social-media', 'Admin\SettingController@socialMedia');

    // blog route
    Route::resource('blog', 'Admin\BlogController');

    //  newsletter subscribe
    Route::match(['GET', 'POST'], 'subscriber', 'Admin\SettingController@subscriber');

    // services route

    Route::prefix('service')->name('service.')->group(function () {
        Route::get('','Admin\ServiceController@index')->name('index');
        Route::get('create','Admin\ServiceController@create')->name('create');
        Route::post('create','Admin\ServiceController@store')->name('store');
        Route::get('edit/{id}','Admin\ServiceController@edit')->name('edit');
        Route::post('edit/{id}','Admin\ServiceController@update')->name('update');
        Route::get('delete/{id}','Admin\ServiceController@delete')->name('delete');
    });

    Route::prefix('service-item')->name('service.item.')->group(function(){
        Route::get('','Admin\ServiceController@item')->name('index');
        Route::get('create','Admin\ServiceController@createItem')->name('create');
        Route::post('create','Admin\ServiceController@storeItem')->name('store');
        Route::get('edit/{id}','Admin\ServiceController@editItem')->name('edit');
        Route::post('edit/{id}','Admin\ServiceController@updateItem')->name('update');
        Route::get('delete/{id}','Admin\ServiceController@deleteItem')->name('delete');
    });
});


Route::get('/email', function () {
    // $user = \App\User::find(4);
    // $send = Mail::to($user)->send(new \App\Mail\CutomerWelcome($user));
    // dd($send);
    $orderDetail = \App\Orderitem::where('order_id', 1)->get();
    // dd($orderDetail);
    return view('email.OrderPlaced', compact('orderDetail'));
});
