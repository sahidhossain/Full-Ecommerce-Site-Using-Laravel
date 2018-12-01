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

Route::get('/admin','AdminController@index');
Route::get('/dashboard','SuperAdminController@index');

Route::get('/logout','SuperAdminController@logout');


Route::get('/','HomeController@index');
Route::post('/admin-dashboard','AdminController@dashboard');
		

// Categories adding
Route::get('/add-category','CategoryController@index');
Route::get('/all_category','CategoryController@all_category');
Route::post('/save_category','CategoryController@save_category');
Route::get('/unactive_category/{category_id}','CategoryController@unactive');
Route::get('/active_category/{category_id}','CategoryController@active');
Route::get('/edit_category/{categroy_id}','CategoryController@edit_category');
Route::post('/update_category/{categroy_id}','CategoryController@update_category');
Route::get('/delete_category/{category_id}','CategoryController@delete_category');

// Manufacture adding and showing
Route::get('/add_manufacture','ManufactureController@add_manufacture');
Route::post('/save_manufacture','ManufactureController@save_manufacture');
Route::get('/all_manufacture','ManufactureController@all_manufacture');
Route::get('/unactive_manufacture/{manufacture_id}','ManufactureController@unactive');
Route::get('/active_manufacture/{manufacture_id}','ManufactureController@active');
Route::get('/edit_manufacture/{manufacture_id}','ManufactureController@edit_manufacture');
Route::get('/delete_manufacture/{manufacture_id}','ManufactureController@delete_manufacture');
Route::post('/update_manufacture/{manufacture_id}','ManufactureController@update_manufacture');


// product
Route::get('/add_product','ProductController@add_product');
Route::post('/save_product','ProductController@save_product');
Route::get('/all_product','ProductController@all_product');
Route::get('/unactive_product/{product_id}','ProductController@unactive');
Route::get('/active_product/{product_id}','ProductController@active');
Route::get('/edit_product/{product_id}','ProductController@edit_product');
Route::get('/delete_product/{product_id}','ProductController@delete_product');
Route::post('/update_product/{product_id}','ProductController@update_product');