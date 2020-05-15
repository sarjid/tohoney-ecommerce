<?php

use App\Category;

use App\Wishlist;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/','FontendController@index');

// logout

Route::get('logout','FontendController@logout')->name('user.logout');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');;

// Category
Route::get('Category/all','CategoryController@Allcat')->name('all.category');
Route::get('Category/Add','CategoryController@showCat')->name('showadd.cat');
Route::post('Category/Store','CategoryController@AddCat')->name('add.category');
// Edit
Route::get('Category/Edit/{id}','CategoryController@EditCat');
Route::post('update.category/{id}','CategoryController@UpdateCat');
// SoftDeletes
Route::get('category/delete/{id}','CategoryController@SoftDel');
// Restore
Route::get('Category/restore/{id}','CategoryController@Restoredata');
Route::get('category/hardDelete/{id}','CategoryController@HardDelete');

// banner
Route::get('Banner/Add','Admin\BannerController@AddBanner')->name('add.banner');
Route::get('Banner/All','Admin\BannerController@ShowBanner')->name('all.banner');
Route::post('Banner/store','Admin\BannerController@Store')->name('store.banner');

// active
Route::get('inactive/{id}','Admin\BannerController@inactive');
Route::get('active/{id}','Admin\BannerController@active');
Route::get('Banner-Edit/{id}','Admin\BannerController@Edit');
Route::post('Banner-Update/{id}','Admin\BannerController@update');
// delete
Route::get('delete/banner/{id}','Admin\BannerController@Delete');

// Testimonial
Route::get('Testimonial/Add','Admin\TestimonialController@Addtestimonial')->name('add.testimonial');
Route::post('Testimonial/store','Admin\TestimonialController@Store')->name('store.testimonial');
Route::get('Testimonial/All','Admin\TestimonialController@showAll')->name('all.testimonial');

// product

Route::get('Product/Add','Admin\ProductController@AddProduct')->name('add.product');
Route::post('Product/store','Admin\ProductController@StoreProduct')->name('store.product');
Route::get('Product/All','Admin\ProductController@AllProduct')->name('all.product');
Route::get('product-view/{id}','Admin\ProductController@ProductView');
Route::get('Delete/Product/{id}','Admin\ProductController@DeleteProduct');
Route::get('Product-Edit/{id}','Admin\ProductController@Edit');
Route::post('Product-Update/{id}','Admin\ProductController@Update');
Route::get('product/inactive/{id}','Admin\ProductController@Inactive');
Route::get('product/active/{id}','Admin\ProductController@Active');
// view product modal with ajax
Route::get('/cart/product/view/{id}','Admin\ProductController@viewProductAjax');

// product review
Route::post('Product/Review','Admin\ProductreviewController@StoreReview')->name('store.review');

// Coupon
Route::get('Product/Coupon','Admin\CouponController@index')->name('product.coupon');
Route::post('Product/Coupon-Store','Admin\CouponController@Store')->name('coupon.store');
Route::get('Coupon/Delete/{id}','Admin\CouponController@Delete');
Route::get('Product/Coupon-Edit/{id}','Admin\CouponController@Edit');
Route::post('Coupon/Update/{id}','Admin\CouponController@Update');




// cart

Route::post('Add/To-Cart/','Admin\CartController@AddCart')->name('add.cart');
Route::get('cart','Admin\CartController@CartPage');
Route::get('cart/{coupon_name}','Admin\CartController@CartPage');
Route::get('delete-cart/{id}','Admin\CartController@DeleteCart');
Route::post('Cart/update','Admin\CartController@UpdateCart')->name('cart.update');
// delete by ajax
// Route::get('/delete/cart/{id}','Admin\CartController@DeleteCartAjax');
// cart add by ajax
Route::get('/add/cart/{id}','Admin\CartController@AddCartAjax');

// Checkout
Route::post('Checkout','Admin\CheckoutController@CheckoutPage');
Route::post('Checkout/Post','Admin\CheckoutController@CheckoutPost');
// ============================== payment Process ==============================
// stripe
Route::get('stripe', 'StripePaymentController@stripe');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');

// Register controller
Route::get('Customer/Registration','Customer_registerController@RegisterForm')->name('Customer.register');
Route::post('Customer/Register','Customer_registerController@Register')->name('Register');
// Wishlist add by ajax
Route::get('/add/wishlist/{id}','Admin\WishlistController@addwishlist');
Route::get('delete-wishlist/{id}','Admin\WishlistController@Deletewishlist');
Route::get('wishlist/page','Admin\WishlistController@wishlistPage')->name('wishlist.page');
// add cart form wishlist
Route::post('Add/To-Cart/wishlist','Admin\WishlistController@AddCartFromWishlist')->name('add.cart.wishlist');

// blog
    // category
Route::get('Blog/Category-All','Admin\BlogcatController@BlogCategory')->name('blog.category');
Route::post('Blog/Category-Store','Admin\BlogcatController@BlogCategoryStore')->name('blog.category.store');

Route::get('Blog/Post/Add','Admin\BlogController@AddPost')->name('add.post');
Route::post('Blog/Post/store','Admin\BlogController@StorePost')->name('store.post');
Route::get('Blog/Post/All','Admin\BlogController@AllPost')->name('all.post');
Route::get('Blog/Post/Comments','Admin\BlogController@AllComment')->name('post.comment');
Route::get('publish/{id}','Admin\BlogController@PublishComment');
Route::get('Comment-View/{id}','Admin\BlogController@ViewComment');
Route::get('Delete-Comment/{id}','Admin\BlogController@DeleteComment');

// Comment
Route::post('comment/{id}','Admin\CommentController@StoreComment');

// FaQ
Route::get('Faq/Add','Admin\FaqController@index')->name('faq.index');
Route::post('Faq/Store','Admin\FaqController@Store')->name('faq.store');
// profile
Route::get('User/Profile','ProfileController@profile')->name('user.profile');
Route::post('User/Update','ProfileController@UpdateProfile')->name('update.info');
Route::get('User/Password-Change','ProfileController@PassChange')->name('password.change');
Route::post('User/Update-Password','ProfileController@UpdatePass')->name('update.pass');
Route::get('User/Update-Image','ProfileController@image')->name('user.image');
Route::post('user/Store-Image','ProfileController@StoreImage')->name('upload.image');

// fontend routes
    // pages
Route::get('contact','FontendController@contactPage')->name('contact.page');
Route::get('about','FontendController@aboutPage')->name('about.page');
Route::get('Blog','FontendController@BlogPage')->name('blog.page');
Route::get('Blog/Post-Details/{id}','FontendController@PostDetails');
Route::get('Shop','FontendController@ShopPage')->name('shop.page');



// product view
Route::get('Product/Details/{id}','FontendController@ProductDetails');

Route::post('Send/Message','ContactController@SendMsg')->name('contact.msg');


