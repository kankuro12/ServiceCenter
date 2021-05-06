<?php
Route::get('/', 'FrontController@index');
Route::get('shops', 'ProductController@productShop');
Route::get('shops-1', 'ProductController@productShop_1');
Route::get('product/detail/{id}', 'ProductController@productDetail');
Route::get('shops-by-category/{id}', 'ProductController@productShopByCategory');
Route::get('shops-by-brand/{id}', 'ProductController@productShopByBrand');

Route::get('price/by/color/{id}', 'ProductController@priceByColor');
Route::get('price/by/size/{id}', 'ProductController@priceBySize');


Route::get('customer-signup', 'CustomerAuthController@customerRigester');
Route::post('customer-signup', 'CustomerAuthController@customerLoginRegister');
Route::post('customer-login', 'CustomerAuthController@customerLogin');
Route::get('logout', 'CustomerAuthController@customerLogout');


Route::get('blog/detail/{id}', 'BlogController@singleBlogDetail');

Route::get('stock/by-size/{product_id}/{size_id}', 'ProductController@stockGetBySize');
Route::get('size/by-color/{color_id}/{id}', 'ProductController@getSizeByColor');
Route::get('price/by-size/{color_id}/{size_id}/{product_id}', 'ProductController@getPriceBySize');




// product fileter routes
Route::match(['GET', 'POST'], 'color-filter', 'ProductController@colorFilter');
Route::match(['GET', 'POST'], 'size-filter', 'ProductController@sizeFilter');
Route::match(['GET', 'POST'], 'brand-filter', 'ProductController@brandFilter');
Route::match(['GET', 'POST'], 'category-filter', 'ProductController@categoryFilter');
Route::match(['GET', 'POST'], 'price-short', 'ProductController@priceShort');


// cart routes
Route::get('shopping-cart', 'CartController@index');
Route::get('cart/item/list', 'CartController@getCartItems');
Route::post('add-to-cart', 'CartController@productAddToCart');
Route::get('cart/update-qty/{id}/{qty}', 'CartController@updateQtyOfCartItem');
Route::get('remove/cart/item/{id}', 'CartController@cartItemRemove');
Route::post('apply/coupon-code', 'CartController@applyCouponCode');
Route::get('api/remove/cart/item/{id}', 'CartController@cartItemRemoveApi');

// search product route
Route::match(['GET', 'POST'], 'search-product', 'ProductController@searchProduct')->name('search.product');

// page Routes

Route::get('about-us', 'PageController@aboutUs');
Route::get('contact-us', 'PageController@contactUs');
Route::get('terms-and-condition', 'PageController@termsAndCondition');

// wishlist route

Route::match(['GET', 'POST'], 'wishlists', 'CustomerAuthController@wishList');
Route::get('add-to-withlist/{product_id}', 'CustomerAuthController@AddProductToWishlist');

// forget password
Route::match(['GET', 'POST'], 'forget-password', 'CustomerAuthController@forgetPassword');
Route::match(['GET', 'POST'], 'change-password', 'CustomerAuthController@changePassword');