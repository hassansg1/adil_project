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

Route::get('/', 'InvoiceController@index');
Route::post('/create/invoice','InvoiceController@store');
Auth::routes();


Route::group(['middleware' => 'auth'], function () {

    Route::get('/admin', 'AdminController@index');
    Route::get('/admin/csv', 'AdminController@showFiles');
    Route::get('/edit/invoice/{id}','InvoiceController@edit');
    Route::post('/update/invoice/{id}','InvoiceController@update');
    Route::get('/delete/invoice/{id}','InvoiceController@delete');

});

Route::get('files/{file_name}', function($file_name = null)
{
    $path = public_path().'/files/'.$file_name;
    if (file_exists($path)) {
        return \Illuminate\Support\Facades\Response::download($path);
    }
});

