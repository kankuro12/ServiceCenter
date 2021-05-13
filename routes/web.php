<?php

use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Need\AuthController;
use App\Http\Controllers\Need\BookingController;
use App\Http\Controllers\Need\HomeController;
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



route::name('n.front.')->group(function(){
    route::get('',[HomeController::class,"index"])->name('home');
    route::post('message',[HomeController::class,"message"])->name('message');

    //authentication
    route::get('auth',[AuthController::class,"index"])->name('auth');
    route::post('plogin',[AuthController::class,"login"])->name('login');
    route::post('signup',[AuthController::class,"signup"])->name('signup');

    route::name('book.')->prefix("bike-service")->group(function(){

        route::match(['get','post'],'step1',[BookingController::class,"step1"])->name('step1');
        route::match(['get','post'],'step2',[BookingController::class,"step2"])->name('step2');
        route::match(['get','post'],'shop',[BookingController::class,"shop"])->name('shop');
        route::match(['get','post'],'addToCart',[BookingController::class,"addToCart"])->name('addToCart');
        route::match(['get','post'],'removeFromCart',[BookingController::class,"removeFromCart"])->name('removeFromCart');
        
    });


    
    Route::middleware(['checkuser'])->group(function () {
        route::name('book.')->prefix("bike-service")->group(function(){
            route::match(['get','post'],'checkout',[BookingController::class,"checkout"])->name('checkout');
            route::match(['get','post'],'success',[BookingController::class,"success"])->name('success');
        });
        
        route::match(['get','post'],'postjob',[HomeController::class,"postjob"])->name('postjob');
        route::match(['get','post'],'postcv',[HomeController::class,"postcv"])->name('postcv');
        route::match(['get','post'],'delivery',[HomeController::class,"delivery"])->name('delivery');
        route::match(['get','post'],'subs',[HomeController::class,"subs"])->name('subs');
        route::get('logout',[AuthController::class,"logout"])->name('logout');  
        
        route::get('user',[AuthController::class,'user'])->name('user');
        route::get('user-order/{order}',[AuthController::class,'order'])->name('user-order');
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

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'],  function () {
    Route::name('admin.')->group(function(){
        Route::get('delivery', [UserController::class,'delivery'])->name('delivery');
        Route::get('deliverySingle/{delivery}', [UserController::class,'deliverySingle'])->name('deliverySingle');
        
        Route::get('jobseeker', [UserController::class,'jobseeker'])->name('jobseeker');
        Route::get('jobseekerSingle/{jobseeker}', [UserController::class,'jobseekerSingle'])->name('jobseekerSingle');
        
        Route::get('job', [UserController::class,'job'])->name('job');
        Route::get('job-single/{job}', [UserController::class,'jobSingle'])->name('job-Single');

        Route::get('serviceOrder', [OrderController::class,'serviceOrder'])->name('serviceOrder');
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
