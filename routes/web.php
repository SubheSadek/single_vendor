<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\publicController;
use App\Http\Controllers\UserController;



                                            //*All-public-routes*//

                        //product-routes
Route::get('/', [publicController::class, 'index']);
Route::get('/category-product/{id}', [publicController::class, 'proByCategories']);
Route::get('/product-shortview/{id}', [publicController::class, 'proById']);
Route::get('/product/details/{id}', [publicController::class, 'proDetails']);
Route::get('/products', [publicController::class, 'products']);
Route::get('/category/{id}', [publicController::class, 'catByName']);
Route::get('/aboutUs', [publicController::class, 'aboutUs']);
Route::get('/contactUs', [publicController::class, 'contactUs']);
Route::post('/messages',[publicController::class, 'messages']); 


                        

                        // Cart-routes
Route::get('/cart', [publicController::class, 'viewcart']);
Route::get('/cart-cartdata',[publicController::class, 'get']);
Route::post('/add-cart', [publicController::class, 'addToCart'])->name('add.cart');
Route::get('/remove-cart/{id}', [publicController::class, 'removecart']);
Route::get('/edit-cart', [publicController::class, 'editcart']);
Route::get('/update-qty/{id}', [publicController::class, 'updateqty']);
Route::get('/decrement-qty/{id}', [publicController::class, 'decrement']);
Route::get('/cart-subtotal', [publicController::class, 'subtotal']);

                        // wishlist-routes
Route::get('/add-wishlist/{id}',[publicController::class, 'addToWishlist']);
Route::get('/wishlist',[publicController::class, 'Wishlist']);
Route::get('/delete-wishlist/{id}',[publicController::class, 'deleteWish']);
Route::post('/wishto-cart', [publicController::class, 'wishToCart']);














                                //*All-User-routes*//
Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::get('/register', [UserController::class, 'showRegister'])->name('register');
Route::post('/user-register', [UserController::class, 'register']);
Route::post('/user-login', [UserController::class, 'login'])->name('admin.login');
Route::post('/password-change', [UserController::class, 'changepass']);

Route::group(['middleware'=>'auth'],function (){

    Route::get('/home', [UserController::class, 'dashboard']);
    Route::get('/logout',[UserController::class, 'logout'])->name('logout');
    Route::get('/checkout',[UserController::class, 'checkout']);
    Route::post('/shipping-info',[UserController::class, 'shippingInfo']);
    Route::get('/show-info',[UserController::class, 'showInfo']);
    Route::post('/cash-payment',[UserController::class, 'cashPayment']);
    Route::post('/stripe-payment',[UserController::class, 'stripePayment']);
    Route::get('/order-quickview/{id}',[UserController::class, 'orderview']);
    




});








                                //*All-Admin-routes*//
Route::get('/admin/login', [AdminController::class, 'showAdminLogin'])->name('show.admin.login');
Route::get('/admin/forgot/password', [AdminController::class, 'showAdminForgot'])->name('show.admin.forgot');
Route::post('/admin-login', [AdminController::class, 'AdminLogin'])->name('admin.login');

Route::group(['prefix'=>'admin','middleware'=>'auth:admin'],function (){

    Route::get('/home', [AdminController::class, 'adminHome'])->name('admin.home');
    Route::get('/logout',[AdminController::class, 'adminLogout'])->name('admin.logout');
    Route::get('/register', [AdminController::class, 'showAdminRegister'])->name('show.admin');
    Route::post('/admin-register', [AdminController::class, 'AdminRegister'])->name('admin.register');
    Route::get('/change/password', [AdminController::class, 'showPassChange'])->name('show.admin.change');
    Route::post('/password-change', [AdminController::class, 'passwordChange'])->name('admin.change');

                                // category-routes  
    Route::get('/category', [AdminController::class, 'showCategory'])->name('show.category');
    Route::post('/create-category', [AdminController::class, 'createCategory'])->name('create.category');
    Route::get('/delete-category/{id}', [AdminController::class, 'deleteCategory']);
    Route::get('/category-edit/{id}', [AdminController::class, 'showEdit']);
    Route::post('/category-update',[AdminController::class, 'updateCategory']);
    Route::get('/category-publish/{id}',[AdminController::class, 'publishCategory']);
    Route::get('/category-unpublish/{id}',[AdminController::class, 'unpublishCategory']);

                                // subcategory-routes  
    Route::get('/subcat', [AdminController::class, 'showSubcat'])->name('show.subcat');
    Route::post('/create-subcat', [AdminController::class, 'createSubcat'])->name('create.subcat');
    Route::get('/subcat-edit/{id}', [AdminController::class, 'showEditSubcat']);
    Route::post('/subcat-update',[AdminController::class, 'updateSubcat'])->name('subcat.update');
    Route::get('/subcat-publish/{id}',[AdminController::class, 'publishSubcat']);
    Route::get('/subcat-unpublish/{id}',[AdminController::class, 'unpublishSubcat']);    
    Route::get('/softdelete-subcat/{id}', [AdminController::class, 'softdeleteSubcat']);
    Route::get('/view/trash', [AdminController::class, 'viewTrash']);
    Route::get('/restore-subcat/{id}', [AdminController::class, 'restoreSubcat']);
    Route::get('/force-subcat/{id}', [AdminController::class, 'forceDeleteSubcat']);
    
                                // Brand-routes  
    Route::get('/brand', [AdminController::class, 'showBrand'])->name('show.brand');
    Route::post('/create-brand', [AdminController::class, 'createBrand'])->name('create.brand');
    Route::get('/brand-edit/{id}', [AdminController::class, 'showEditBrand']);
    Route::post('/brand-update',[AdminController::class, 'updateBrand'])->name('brand.update');
    Route::get('/brand-publish/{id}',[AdminController::class, 'publishBrand']);
    Route::get('/brand-unpublish/{id}',[AdminController::class, 'unpublishBrand']);
    Route::get('/delete-brand/{id}', [AdminController::class, 'deleteBrand']);

                              //** Product **/
    Route::get('/product', [AdminController::class, 'showProduct'])->name('show.product');
    Route::get('/get-subcat/{cat_id}', [AdminController::class, 'getProSubcat']);
    Route::get('/product/add', [AdminController::class, 'addProduct'])->name('add.product');
    Route::post('/store-product', [AdminController::class, 'storeProduct'])->name('store.product');
    Route::get('/edit-product/{id}', [AdminController::class, 'editProduct']);
    Route::post('/update-product/{id}', [AdminController::class, 'updateProduct']);
    Route::get('/inactive-product/{id}', [AdminController::class, 'inactiveProduct']);
    Route::get('/active-product/{id}', [AdminController::class, 'activeProduct']);
    Route::get('/delete-product/{id}', [AdminController::class, 'deleteProduct']);
    Route::get('/view/product/{id}', [AdminController::class, 'viewProduct']);



        //Admin Order Routes
    Route::get('/pending/order', [AdminController::class, 'NewOrder'])->name('admin.neworder');
    Route::get('/view/order/{id}', [AdminController::class, 'ViewOrder']);
    Route::get('/payment/accept/{id}', [AdminController::class, 'PaymentAccept']);
    Route::get('/payment/cancel/{id}', [AdminController::class, 'PaymentCancel']);
    Route::get('/accept/payment', [AdminController::class, 'AcceptPaymentOrder'])->name('admin.accept.payment');
    Route::get('/progress/payment', [AdminController::class, 'ProgressPaymentOrder'])->name('admin.progress.payment');
    Route::get('/success/payment', [AdminController::class, 'SuccessPaymentOrder'])->name('admin.success.payment');
    Route::get('/cancel/payment', [AdminController::class, 'CancelPaymentOrder'])->name('admin.cancel.order');
    Route::get('/delivery/progress/{id}', [AdminController::class, 'DeliveryProgress']);
    Route::get('/delivery/done/{id}', [AdminController::class, 'DeliveryDone']);
    
                             //Company Info Routes
    Route::get('/company/info',  [AdminController::class, 'companyInfo']);
    Route::post('/update-setting',  [AdminController::class, 'updateSetting']);

                             //Slider Routes
    Route::get('/slider',  [AdminController::class, 'slider']);
    Route::post('/create-slider', [AdminController::class, 'createSlider']);
    Route::get('/slider-edit/{id}', [AdminController::class, 'showEditSlider']);
    Route::post('/slider-update',[AdminController::class, 'updateSlider']);
    Route::get('/slider-publish/{id}',[AdminController::class, 'publishSlider']);
    Route::get('/slider-unpublish/{id}',[AdminController::class, 'unpublishSlider']);
    Route::get('/delete-slider/{id}', [AdminController::class, 'deleteSlider']);

                             //AboutUs Routes
    Route::get('/about',  [AdminController::class, 'aboutUs']);
    Route::post('/update-about',  [AdminController::class, 'updateAbout']);
    // Route::post('/create-slider', [AdminController::class, 'createSlider']);
    // Route::get('/slider-edit/{id}', [AdminController::class, 'showEditSlider']);
    // Route::post('/slider-update',[AdminController::class, 'updateSlider']);
    // Route::get('/slider-publish/{id}',[AdminController::class, 'publishSlider']);
    // Route::get('/slider-unpublish/{id}',[AdminController::class, 'unpublishSlider']);
    // Route::get('/delete-slider/{id}', [AdminController::class, 'deleteSlider']);






















});


