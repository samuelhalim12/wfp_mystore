<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\MedEquipController;
use App\Http\Controllers\MedicineController;
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
Route::get('/','MedicineController@front_index');
Route::get('cart','MedicineController@cart');
Route::get('add-to-cart/{id}','MedicineController@addToCart');
Route::get('submit_checkout','TransactionController@submit_front')->name('submitCheckout');
// ->middleware(['auth'])
/*
Route::get('/', function () {
    // return view('welcome', ['name' => '']);
    return redirect('/kategori_obat');
});*/

// Route::view('/', "welcome");

Route::get('foo', function(){
    return "Hello Program";
});

// Route::get('user/{id}', function($id){
//     return "User : {$id}";
// });

Route::get('posts/{post}/comments/{comment}', function($postId, $commentId){
    return "Post : {$postId} and Comment : {$commentId}";
});

Route::get('user/{name?}', function($name = 'John'){
    return "User : {$name}";
});

Route::get('foo1', function(){
    return "Foo1";
})->name('namaroute');

Route::get('greeting',function() {
    return view('welcome', ['name' => 'Samantha']);
});

Route::get('mystore', function() {
    return view('mystore');
});

Route::get('catalog', function() {
    return view('catalog', ['catalog' => '']);
});

Route::get('/catalog/{name}',[CatalogController::class,'show']);
Route::get('/catalog/medicines/{medicine_id}',[MedicineController::class,'show']);
Route::get('/catalog/med_equip/{equip_id}',[MedEquipController::class,'show']);
Route::get('formnewproduct','ProductController@create');
Route::get('formupdateproduct ','ProductController@update');

Route::resource('product','ProductResController');
Route::get('report/product/json','ProductResController@jsonListData');

Route::resource('obat','ProductController');
Route::resource('kategori_obat','CategoryController');
Route::resource('medicine','MedicineController');
Route::resource('transaction','TransactionController');
// Route::resource('report','CategoryController');
// Route::resource('report/mednameformprice','CategoryController');
// Route::resource('report/listcategory','CategoryController');
// Route::resource('report/mednameformcatid','CategoryController');
// Route::resource('report/aggregation','CategoryController');
// Route::resource('report/listmedicine/{id}','CategoryController');

Route::get('/report/listmedicine/{id}', 'CategoryController@showlist')->name('reportShowMedicine');
Route::get('/report/listcategory', 'CategoryController@showcategory')->name('reportShowCategory');
Route::get('/report/mednameformprice', 'CategoryController@showNameFormPrice')->name('reportShowMedNameFormPrice');
Route::get('/report/mednameformcatid', 'CategoryController@showmednameformcatid')->name('reportShowMedNameFormCatid');
Route::get('/report/aggregation', 'CategoryController@showaggregation')->name('reportShowAggregation');

Route::post('/products/showInfo','MedicineController@showInfo')->name('medicines.showInfo');
Route::post('/products/showHighestPrice','MedicineController@showHighestPrice')->name('medicines.showHighestPrice');
Route::post('/transactions/showDataAjax/','TransactionController@showAjax')->name('transaction.showAjax');

Route::post('/kategori_obat/getEditForm','CategoryController@getEditForm')->name('category.getEditForm');
Route::post('/kategori_obat/getEditForm2','CategoryController@getEditForm2')->name('category.getEditForm2');
Route::post('/kategori_obat/saveData','CategoryController@saveData')->name('category.saveData');
Route::post('/kategori_obat/deleteData','CategoryController@deleteData')->name('category.deleteData');

// Route::post('kategori_obat',function() {
//     return back()->withInput();
// });
// Route::resource('form_kategori','CategoryController');


// Route::get('/conquer', 'CategoryController@showaggregation')->name('reportShowAggregation');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
