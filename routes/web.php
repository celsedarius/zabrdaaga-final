<?php

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
//Dashboard
//login
Route::get('admin', 'App\Http\Controllerss\loginController@adminIndex')->name('admin.login');
Route::post('admin', 'App\Http\Controllerss\loginController@adminPosted');

Route::group(['middleware' => 'admin'], function(){

 
    Route::get("/admin_panel", 'App\Http\Controllers\admin_panel\dashboardController@index')->name('admin.dashboard');

    Route::get('admin/logout', 'App\Http\Controllers\loginController@adminLogout')->name('admin.logout');
    //categories
    Route::get('/admin_panel/categories', 'App\Http\Controllers\admin_panel\categoriesController@index')->name('admin.categories');
    Route::post('/admin_panel/categories', 'App\Http\Controllers\admin_panel\categoriesController@posted');

    Route::get('/admin_panel/categories/edit/{id}', 'App\Http\Controllers\admin_panel\categoriesController@edit')->name('admin.categories.edit');
    Route::post('/admin_panel/categories/edit/{id}', 'App\Http\Controllers\admin_panel\categoriesController@update');

    Route::get('/admin_panel/categories/delete/{id}', 'App\Http\Controllers\admin_panel\categoriesController@delete')->name('admin.categories.delete');
    Route::post('/admin_panel/categories/delete/{id}', 'App\Http\Controllers\admin_panel\categoriesController@destroy');


    //products
    Route::get('/admin_panel/products', 'App\Http\Controllers\admin_panel\productsController@index')->name('admin.products');

    Route::get('/admin_panel/products/create', 'App\Http\Controllers\admin_panel\productsController@create')->name('admin.products.create');
    Route::post('/admin_panel/products/create', 'App\Http\Controllers\admin_panel\productsController@store');

    Route::get('/admin_panel/products/edit/{id}', 'App\Http\Controllers\admin_panel\productsController@edit')->name('admin.products.edit');
    Route::post('/admin_panel/products/edit/{id}', 'App\Http\Controllers\admin_panel\productsController@update');

    Route::get('/admin_panel/products/delete/{id}', 'App\Http\Controllers\admin_panel\productsController@delete')->name('admin.products.delete');
    Route::post('/admin_panel/products/delete/{id}', 'App\Http\Controllers\admin_panel\productsController@destroy');

    //order management 
    Route::get('/admin_panel/management', 'App\Http\Controllers\admin_panel\managementController@manage')->name('admin.orderManagement');
    Route::post('/admin_panel/management', 'App\Http\Controllers\admin_panel\managementController@update')->name('admin.orderUpdate');

});

Route::get('/login', 'App\Http\Controllers\loginController@userIndex')->name('user.login');
Route::post('/login', 'App\Http\Controllers\loginController@userPosted');

//signup
Route::get('/signup', 'App\Http\Controllers\signupController@userIndex')->name('user.signup');
Route::post('/signup', 'App\Http\Controllers\signupController@userPosted');
Route::post('/check_email', 'App\Http\Controllers\signupController@emailCheck')->name('user.signup.check_email');


//user
Route::get('/', 'App\Http\Controllers\user\userController@index')->name('user.home');
Route::get('/product/{id}', 'App\Http\Controllers\user\userController@view')->name('user.product');

Route::get('/search', 'App\Http\Controllers\user\userController@search')->name('user.search');
Route::get('/search?c={id}', 'App\Http\Controllers\user\userController@view')->name('user.search.cat');



Route::get('/view/{id}', 'App\Http\Controllers\user\userController@view')->name('user.view');
Route::post('/view/{id}', 'App\Http\Controllers\user\userController@post');

Route::get('/cart', 'App\Http\Controllers\user\userController@cart')->name('user.cart');
Route::post('/cart', 'App\Http\Controllers\user\userController@confirm');

Route::post('/edit_cart', 'App\Http\Controllers\user\userController@editCart')->name('user.editCart');
Route::post('/delete_item_from_cart', 'App\Http\Controllers\user\userController@deleteCartItem')->name('user.deleteCartItem');


Route::get('/logout', 'App\Http\Controllers\loginController@userLogout')->name('user.logout');

Route::group(['middleware' => 'user'], function(){
Route::get('/history', 'App\Http\Controllers\user\userController@history')->name('user.history');
});
