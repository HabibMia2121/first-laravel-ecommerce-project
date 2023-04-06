<?php

use App\Http\Controllers\AboutBannerController;
use App\Http\Controllers\AboutClientItemController;
use App\Http\Controllers\AboutFeatureController;
use App\Http\Controllers\AboutServiceController;
use App\Http\Controllers\AboutTeamController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\ContactBannerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactCustomerController;
use App\Http\Controllers\ContactOfficeDetailController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeBannerController;
use App\Http\Controllers\HomeFeatureController;
use App\Http\Controllers\OurProductBannerController;
use App\Http\Controllers\SubcategoryProductController;
use App\Http\Controllers\ProductItemController;
use Rakibhstu\Banglanumber\NumberToBangla;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SslCommerzPaymentController;

// frontend controller start here
    // home route start here
Route::get('/',[FrontendController::class, 'index'])->name('index');
    // our-products route start here
Route::get('our-products',[FrontendController::class, 'our_products'])->name('our_products');
Route::get('product/detail/page/{slug}',[FrontendController::class, 'product_detail_page'])->name('product_detail.page');
Route::post('get/sizes',[FrontendController::class, 'get_sizes'])->name('get.sizes');
Route::post('get/inventory',[FrontendController::class, 'get_inventory'])->name('get.inventory');
    // about route start here
Route::get('about-us',[FrontendController::class, 'about_us'])->name('about');
Route::get('about/service/detail/page/{id}',[FrontendController::class, 'about_service_detail_page'])->name('about_service_detail_page');
    // contact route start here
Route::get('contact-us',[FrontendController::class, 'contact_us'])->name('contact');
// frontend controller end here

// Auth controller start here
Auth::routes(['login'=>false]);
Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login/post', [LoginController::class, 'login'])->name('login.post');
// Auth controller end here

// customer controller start here
Route::get('customer/login',[CustomerController::class, 'customer_login'])->name('customer.login');
Route::post('customer/register/post',[CustomerController::class, 'customer_register_post'])->name('customer_register.post');
Route::get('customer/dashboard',[CustomerController::class, 'customer_dashboard'])->name('customer.dashboard');
Route::post('insert/cart',[CustomerController::class, 'insert_cart'])->name('insert.cart');
Route::get('cart/cartpage',[CustomerController::class, 'cart_page'])->name('cart.page');
Route::post('cart/remove',[CustomerController::class, 'cart_remove'])->name('cart.remove');
Route::post('cart/plus',[CustomerController::class, 'cart_plus'])->name('cart.plus');
Route::post('cart/minus',[CustomerController::class, 'cart_minus'])->name('cart.minus');
Route::post('get/cityise',[CustomerController::class, 'get_cityise'])->name('get.cityise');
Route::post('set/country/city',[CustomerController::class, 'set_country_city'])->name('set.country.city');
Route::get('checkout',[CustomerController::class, 'checkout'])->name('checkout');
Route::post('checkout/post',[CustomerController::class, 'checkout_post'])->name('checkout.post');
Route::post('order/delete/{order_summary_id}',[CustomerController::class, 'order_delete'])->name('order.delete');
Route::get('view/invoice/{order_summary_id}',[CustomerController::class, 'view_invoice'])->name('view.invoice');
Route::get('download/invoice/{order_summary_id}',[CustomerController::class, 'download_invoice'])->name('download.invoice');
Route::get('review/{order_summary_id}',[CustomerController::class, 'review'])->name('review');
Route::post('add/review/{order_detail_id}',[CustomerController::class, 'add_review'])->name('add.review');
Route::get('later/pay/{grand_total}/{order_summary_id}',[CustomerController::class, 'later_pay'])->name('later.pay');
// customer controller end here

// home controller start here
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('admin/profile', [HomeController::class, 'admin_profile'])->name('admin.profile');
Route::post('admin/profile/update/{admin_id}', [HomeController::class, 'admin_profile_update'])->name('admin_profile.update');
Route::post('change/password', [HomeController::class, 'change_password'])->name('change_password');
Route::get('logo/favicon', [HomeController::class, 'logo_favicon'])->name('logo.favicon');
Route::post('logo/update/{logo_id}', [HomeController::class, 'logo_update'])->name('logo.update');
Route::post('favicon/update/{favicon_id}', [HomeController::class, 'favicon_update'])->name('favicon.update');
// home controller end here

// home_banner controller start here
Route::resource('home_banner', HomeBannerController::class);
Route::get('restore/banner/{id}', [HomeBannerController::class, 'restore_banner'])->name('restore_banner');
Route::get('banner/forceDelete/{id}', [HomeBannerController::class, 'banner_forceDelete'])->name('banner.forceDelete');
// home_banner controller end here

// home_feature controller start here
Route::resource('home_feature', HomeFeatureController::class);
Route::get('restore/feature/{id}', [HomeFeatureController::class, 'restore_feature'])->name('restore_feature');
Route::get('feature/forceDelete/{id}', [HomeFeatureController::class, 'feature_forceDelete'])->name('feature.forceDelete');
Route::post('feature/title/{feature_head_id}', [HomeFeatureController::class, 'feature_title'])->name('feature.title');
Route::post('feature/short_text', [HomeFeatureController::class, 'feature_short_text'])->name('feature.short_text');
Route::post('feature_short_list/delete/{feature_short_list_id}', [HomeFeatureController::class, 'feature_short_list_delete'])->name('feature_short_list.delete');
Route::get('restore_feature_short/content/{id}', [HomeFeatureController::class, 'restore_feature_short_content'])->name('restore_feature_short_content');
Route::get('feature_short_content/forceDelete/{id}', [HomeFeatureController::class, 'feature_short_content_forceDelete'])->name('feature_short_content.forceDelete');
// home_feature controller end here

// our-products-banner controller start here
Route::get('our_products/banner/page',[OurProductBannerController::class, 'our_products_banner_page'])->name('our_products.banner_page');
Route::post('our/product/banner/update/{id}',[OurProductBannerController::class, 'our_product_banner_update'])->name('our_product_banner.update');
// our-products-banner controller end here

// our-products category controller start here
Route::resource('category', CategoryProductController::class);
Route::get('restore/category/{id}', [CategoryProductController::class, 'restore_category'])->name('restore_category');
Route::get('category/forceDelete/{id}', [CategoryProductController::class, 'category_forceDelete'])->name('category.forceDelete');
// our-products category controller end here

// our-products subcategory controller start here
Route::resource('subcategory', SubcategoryProductController::class);
Route::get('restore/subcategory/{id}', [SubcategoryProductController::class, 'restore_subcategory'])->name('restore_subcategory');
Route::get('subcategory/forceDelete/{id}', [SubcategoryProductController::class, 'subcategory_forceDelete'])->name('subcategory.forceDelete');
// our-products subcategory controller end here

// our-products product_item controller start here
Route::resource('producta_item', ProductItemController::class);
Route::get('restore/product/{id}', [ProductItemController::class, 'restore_product'])->name('restore_product');
Route::get('product/forceDelete/{id}', [ProductItemController::class, 'product_forceDelete'])->name('product.forceDelete');
Route::post('get/subcategories',[ProductItemController::class, 'get_subcategories'])->name('get.subcategories');
Route::post('edit/get/subcategories',[ProductItemController::class, 'edit_for_get_subcategories'])->name('edit_for_get.subcategories');
    // product variation route start here
Route::get('variation/manager',[ProductItemController::class, 'variation_manager'])->name('variation.manager');
Route::post('color/variation',[ProductItemController::class, 'color_variation'])->name('color.variation');
Route::get('color/delete/{id}',[ProductItemController::class, 'color_delete'])->name('color.delete');
Route::get('restore/color/{id}', [ProductItemController::class, 'restore_color'])->name('restore_color');
Route::get('color/forceDelete/{id}', [ProductItemController::class, 'color_forceDelete'])->name('color.forceDelete');

Route::post('size/variation', [ProductItemController::class, 'size_variation'])->name('size.variation');
Route::get('size/delete/{id}',[ProductItemController::class, 'size_delete'])->name('size.delete');
Route::get('restore/size/{id}', [ProductItemController::class, 'restore_size'])->name('restore_size');
Route::get('size/forceDelete/{id}', [ProductItemController::class, 'size_forceDelete'])->name('size.forceDelete');
    // product variation route end here
Route::get('add/feature/photo/{product_id}', [ProductItemController::class, 'add_feature_photo'])->name('add_feature.photo');
Route::post('product/feature/photo/post/{product_id}', [ProductItemController::class, 'product_feature_photo_post'])->name('product_feature_photo.post');
Route::get('product/feature/photo/delete/{product_id}', [ProductItemController::class, 'product_feature_photo_delete'])->name('product_feature_photo_delete');

Route::get('add/inventory/{product_id}', [ProductItemController::class, 'add_inventory'])->name('add.inventory');
Route::post('add/inventory/post/{product_id}', [ProductItemController::class, 'add_inventory_post'])->name('add_inventory.post');
Route::get('inventory/delete/{product_id}', [ProductItemController::class, 'inventory_delete'])->name('inventory.delete');
Route::get('shopping/charge', [ProductItemController::class, 'shopping_charge'])->name('shopping.charge');
Route::post('add/shopping', [ProductItemController::class, 'add_shopping'])->name('add.shopping');
Route::post('shopping/delete/{shopping_id}', [ProductItemController::class, 'shopping_delete'])->name('shopping.delete');
Route::get('restore/shopping/{id}', [ProductItemController::class, 'restore_shopping'])->name('restore_shopping');
Route::get('shopping/forceDelete/{id}', [ProductItemController::class, 'shopping_forceDelete'])->name('shopping.forceDelete');
Route::get('order', [ProductItemController::class, 'order'])->name('order');
Route::post('order/status/change/{order_summary_id}', [ProductItemController::class, 'order_status_change'])->name('order_status.change');
Route::post('product/order/delete/{order_summary_id}', [ProductItemController::class, 'product_order_delete'])->name('product_order.delete');
Route::get('restore/order/{id}', [ProductItemController::class, 'restore_order'])->name('restore_order');
Route::get('order/forceDelete/{id}', [ProductItemController::class, 'order_forceDelete'])->name('order.forceDelete');

// our-products product_item controller end here

// about-banner controller start here
Route::get('about_banner',[AboutBannerController::class, 'about_banner_page'])->name('about_banner_page');
Route::post('about/banner/update/{id}',[AboutBannerController::class, 'about_banner_update'])->name('about_banner.update');
// about-banner controller end here

// about-feature controller start here
Route::resource('about_feature',AboutFeatureController::class);
Route::get('restore/about/feature/{id}', [AboutFeatureController::class, 'restore_about_feature'])->name('restore_about_feature');
Route::get('about/feature/forceDelete/{id}', [AboutFeatureController::class, 'about_feature_forceDelete'])->name('about_feature.forceDelete');
    //feature social icon route start here
Route::post('feature/social/icon', [AboutFeatureController::class, 'feature_social_icon'])->name('feature_social.icon');
Route::get('feature/icon/editpage/{social_icon_id}', [AboutFeatureController::class, 'feature_icon_editpage'])->name('feature_icon.editpage');
Route::post('feature/social/icon/update/{social_icon_id}', [AboutFeatureController::class, 'feature_social_icon_update'])->name('feature_social.icon_update');
Route::post('feature/icon/delete/{id}', [AboutFeatureController::class, 'feature_icon_delete'])->name('feature_icon.delete');
Route::get('restore/feature/social/icon/{id}', [AboutFeatureController::class, 'restore_feature_social_icon'])->name('restore.feature_social_icon');
Route::get('feature/social/icon/forceDelete/{id}', [AboutFeatureController::class, 'feature_social_icon_forceDelete'])->name('feature_social_icon.forceDelete');
    //feature social icon route end here
// about-feature controller end here

// about-team controller start here
Route::resource('about_team',AboutTeamController::class);
Route::get('restore/about/team/{id}', [AboutTeamController::class, 'restore_about_team'])->name('restore_about_team');
Route::get('about/team/forceDelete/{id}', [AboutTeamController::class, 'about_team_forceDelete'])->name('about_team.forceDelete');
    //team social icon route start here
Route::post('team/social/icon', [AboutTeamController::class, 'team_social_icon'])->name('team_social.icon');
Route::get('team/icon/editpage/{social_icon_id}', [AboutTeamController::class, 'team_icon_editpage'])->name('team_icon.editpage');
Route::post('team/social/icon/update/{social_icon_id}', [AboutTeamController::class, 'team_social_icon_update'])->name('team_social.icon_update');
Route::post('team/icon/delete/{id}', [AboutTeamController::class, 'team_icon_delete'])->name('team_icon.delete');
Route::get('restore/team/social/icon/{id}', [AboutTeamController::class, 'restore_team_social_icon'])->name('restore.team_social_icon');
Route::get('team/social/icon/forceDelete/{id}', [AboutTeamController::class, 'team_social_icon_forceDelete'])->name('team_social_icon.forceDelete');
    //team social icon route end here
// about-team controller end here

// about-service controller start here
Route::resource('about_service',AboutServiceController::class);
Route::get('restore/about/service/{id}', [AboutServiceController::class, 'restore_about_service'])->name('restore_about_service');
Route::get('about/service/forceDelete/{id}', [AboutServiceController::class, 'about_service_forceDelete'])->name('about_service.forceDelete');
Route::get('about/service/background/photo', [AboutServiceController::class, 'service_bg_photo'])->name('service.bg_photo');
Route::post('service/bg_photo/update/{id}', [AboutServiceController::class, 'service_bg_photo_update'])->name('service_bg_photo.update');
// about-service controller end here

// about-client item controller start here
Route::resource('about_client',AboutClientItemController::class);
Route::get('restore/about/client/{id}', [AboutClientItemController::class, 'restore_about_client'])->name('restore_about_client');
Route::get('about/client/forceDelete/{id}', [AboutClientItemController::class, 'about_client_forceDelete'])->name('about_client.forceDelete');
// about-client item controller end here

// contact from_data_show controller start here
Route::get('contact/from/data/show',[ContactController::class,'contact_from_data_show'])->name('contact.from_data_show');
Route::post('contact/from/delete/{contact_id}', [ContactController::class, 'contact_from_delete'])->name('contact_from.delete');
// contact from_data_show controller end here

// contact banner controller start here
Route::get('contact/banner/page',[ContactBannerController::class,'contact_banner_page'])->name('contact.banner_page');
Route::post('contact/banner/update/{id}',[ContactBannerController::class,'contact_banner_update'])->name('contact_banner.update');
// contact banner controller end here

// contact-office-detail controller start here
Route::get('office/detail/update_page',[ContactOfficeDetailController::class,'office_detail_update_page'])->name('office_detail.update_page');
Route::post('office/detail/update/{id}',[ContactOfficeDetailController::class,'office_detail_update'])->name('office_detail.update');
    //contact office detail social icon route start here
Route::post('office/social/icon', [ContactOfficeDetailController::class, 'office_social_icon'])->name('office_social.icon');
Route::get('contact/office/icon/editpage/{social_icon_id}', [ContactOfficeDetailController::class, 'contact_office_icon_editpage'])->name('contact_office_icon.editpage');
Route::post('contact/office/social/icon/update/{social_icon_id}', [ContactOfficeDetailController::class, 'contact_office_social_icon_update'])->name('contact_office_social.icon_update');
Route::post('contact/office/icon/delete/{id}', [ContactOfficeDetailController::class, 'contact_office_icon_delete'])->name('contact_office.icon_delete');
Route::get('restore/contact_office/social/icon/{id}', [ContactOfficeDetailController::class, 'restore_contact_office_social_icon'])->name('restore.contact_office_social_icon');
Route::get('contact_office/social/icon/forceDelete/{id}', [ContactOfficeDetailController::class, 'contact_office_social_icon_forceDelete'])->name('contact_office_social_icon.forceDelete');
//contact office detail social icon route end here
Route::get('embed/location/link', [ContactOfficeDetailController::class, 'embed_location_link'])->name('embed_location.link');
Route::post('post/embed/map/link/{map_id}', [ContactOfficeDetailController::class, 'post_embed_map_link'])->name('post.embed_map_link');
// contact-office-detail controller end here

// contact controller start here
Route::post('customer/data/store',[ContactController::class,'customer_data_store'])->name('customer_data.store');
Route::get('contact/describe/page',[ContactController::class,'contact_describe_page'])->name('contact_describe.page');
Route::post('contact/describe/post',[ContactController::class,'contact_describe_post'])->name('contact_describe.post');
Route::get('contact/describe/editpage/{describe_info_id}',[ContactController::class,'contact_describe_editpage'])->name('contact_describe.editpage');
Route::post('contact/describe/update/{describe_info_id}',[ContactController::class,'contact_describe_update'])->name('contact_describe.update');
Route::post('contact/describe/delete/{id}',[ContactController::class,'contact_describe_delete'])->name('contact_describe.delete');
Route::get('restore/contact/describe/{id}', [ContactController::class, 'restore_contact_describe'])->name('restore_contact_describe');
Route::get('contact/describe/forceDelete/{id}', [ContactController::class, 'contact_describe_forceDelete'])->name('contact_describe.forceDelete');
// contact controller end here

// contact-client item controller start here
Route::resource('contact_client',ContactCustomerController::class);
Route::get('restore/contact/client/{id}', [ContactCustomerController::class, 'restore_contact_client'])->name('restore_contact_client');
Route::get('contact/client/forceDelete/{id}', [ContactCustomerController::class, 'contact_client_forceDelete'])->name('contact_client.forceDelete');
// contact-client item controller end here

// SSLCOMMERZ Start
Route::get('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
// SSLCOMMERZ End
