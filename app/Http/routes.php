<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
    Home Route
 */
Route::get('/', function () {
    return redirect('/products');
});

/*
    Auth Routes
 */
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

/*
    Registration Routes
 */
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

/*
    Product Routes
 */
Route::get('products/create', [
    'uses'       => 'ProductController@create',
    'as'         => 'products.create',
    'middleware' => 'auth'
]);

Route::get('products/{product}/edit', [
    'uses'       => 'ProductController@edit',
    'as'         => 'products.edit',
    'middleware' => 'auth'
]);


Route::resource('products', 'ProductController', [
    'except' => ['create', 'edit']
]);


/*
    User Routes
 */
Route::get('user/products', [
    'uses'       => 'UserController@products',
    'as'         => 'user.products',
    'middleware' => 'auth'
]);

Route::get('user/messages', [
    'uses'       => 'UserController@messages',
    'as'         => 'user.messages',
    'middleware' => 'auth'
]);


/*
    Cart Routes
 */

Route::get('cart', [
    'uses'       => 'CartController@index',
    'as'         => 'cart',
    'middleware' => 'auth'
]);

Route::post('cart/add/{product_id}', [
    'uses'       => 'CartController@add',
    'as'         => 'cart.add',
    'middleware' => 'auth'
]);

Route::delete('cart/reset', [
    'uses'       => 'CartController@reset',
    'as'         => 'cart.reset',
    'middleware' => 'auth'
]);

Route::delete('cart/{cart_item_id}/delete', [
    'uses'       => 'CartController@delete',
    'as'         => 'cart.delete',
    'middleware' => 'auth'
]);

/*
    Image routes
 */

Route::post('/images/stage', [
    'uses'       => 'ImageController@stage',
    'as'         => 'image.stage',
    'middleware' => 'auth'
]);
