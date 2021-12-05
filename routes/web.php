<?php

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
	
	Auth::routes();
	Route::get('/logout', 'MainAdminController@logout');
	Route::prefix('admin')->group(function () {
		Route::get('/home', 'MainAdminController@index')->name('home');
		
		Route::prefix('/cars')->group(function () {
			Route::get('/','\App\Http\Controllers\CarController@index')->name('cars.index'); // return list view
			Route::get('/list','\App\Http\Controllers\CarController@list')->name('cars.all'); // return json data
			Route::get('/create','\App\Http\Controllers\CarController@create')->name('cars.create'); // show create view
			Route::get('/edit/{car}','\App\Http\Controllers\CarController@edit')->name('cars.edit'); // show edit view
			Route::put('/update/{car}','\App\Http\Controllers\CarController@update')->name('cars.update'); // update car record
			Route::post('/store','\App\Http\Controllers\CarController@store')->name('cars.store'); // create car record
			Route::get('/show/{car}','\App\Http\Controllers\CarController@show')->name('cars.show'); // show car view
			Route::get('/{car}','\App\Http\Controllers\CarController@view')->name('cars.view'); // return car record json
			Route::get('/delete/{car}','\App\Http\Controllers\CarController@destroy')->name('cars.delete'); // delete car
		});
		
		Route::prefix('/llists')->group(function () {
			Route::get('/','\App\Http\Controllers\LookupListController@index')->name('lookup-lists.index');
			Route::get('/list','\App\Http\Controllers\LookupListController@list')->name('lookup-lists.all');
			Route::get('/create','\App\Http\Controllers\LookupListController@create')->name('lookup-lists.create');
			Route::get('/edit/{lookuplist}','\App\Http\Controllers\LookupListController@edit')->name('lookup-lists.edit');
			Route::put('/update/{lookuplist}','\App\Http\Controllers\LookupListController@update')->name('lookup-lists.update');
			Route::post('/store','\App\Http\Controllers\LookupListController@store')->name('lookup-lists.store');
			Route::get('/show/{lookuplist}','\App\Http\Controllers\LookupListController@show')->name('lookup-lists.show');
			Route::get('/{lookuplist}','\App\Http\Controllers\LookupListController@view')->name('lookup-lists.view');
			Route::get('/delete/{lookuplist}','\App\Http\Controllers\LookupListController@destroy')->name('lookup-lists.delete');
		});
		
		Route::prefix('/lvalues/')->group(function () {
			Route::get('/','\App\Http\Controllers\LookupValueController@index')->name('lookup-values.index');
			Route::get('/list/{lookuplist?}','\App\Http\Controllers\LookupValueController@list')->name('lookup-values.all');
			Route::get('/{lookuplist}/create','\App\Http\Controllers\LookupValueController@create')->name('lookup-values.create');
			Route::get('/edit/{lookupvalue}','\App\Http\Controllers\LookupValueController@edit')->name('lookup-values.edit');
			Route::put('/update/{lookupvalue}','\App\Http\Controllers\LookupValueController@update')->name('lookup-values.update');
			Route::post('/store','\App\Http\Controllers\LookupValueController@store')->name('lookup-values.store');
			Route::get('/show/{lookupvalue}','\App\Http\Controllers\LookupValueController@show')->name('lookup-values.show');
			Route::get('/{lookupvalue}','\App\Http\Controllers\LookupValueController@view')->name('lookup-values.view');
			Route::get('/delete/{lookupvalue}','\App\Http\Controllers\LookupValueController@destroy')->name('lookup-values.delete');
			
		});
		
		//		Route::match(['get','put'],'/update/{lookuplist}','\App\Http\Controllers\LookupListController@update')->name('lookup-lists.update');
		
	});
