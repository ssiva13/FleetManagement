<?php
	
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Route;

	/*
	|--------------------------------------------------------------------------
	| API Routes
	|--------------------------------------------------------------------------
	|
	| Here is where you can register API routes for your application. These
	| routes are loaded by the RouteServiceProvider within a group which
	| is assigned the "api" middleware group. Enjoy building your API!
	|
	*/
	
	//Route::middleware('auth:api')->get('/user', function (Request $request) {
	//    return $request->user();
	//});

	Route::prefix('/cars')->group(function () {
		Route::get('/list','\App\Http\Controllers\CarController@list')->name('cars.all'); // return json data
		Route::put('/update/{car}','\App\Http\Controllers\CarController@update')->name('cars.update'); // update car record
		Route::post('/store','\App\Http\Controllers\CarController@store')->name('cars.store'); // create car record
		Route::get('/{car}','\App\Http\Controllers\CarController@view')->name('cars.view'); // return car record json
		Route::get('/delete/{car}','\App\Http\Controllers\CarController@destroy')->name('cars.delete'); // delete car
	});
	Route::prefix('/llists')->group(function () {
		Route::get('/list','\App\Http\Controllers\LookupListController@list')->name('lookup-lists.all');
		Route::put('/update/{lookuplist}','\App\Http\Controllers\LookupListController@update')->name('lookup-lists.update');
		Route::post('/store','\App\Http\Controllers\LookupListController@store')->name('lookup-lists.store');
		Route::get('/{lookuplist}','\App\Http\Controllers\LookupListController@view')->name('lookup-lists.view');
		Route::get('/delete/{lookuplist}','\App\Http\Controllers\LookupListController@destroy')->name('lookup-lists.delete');
	});
	Route::prefix('/lvalues')->group(function () {
		Route::get('/list/{lookuplist?}','\App\Http\Controllers\LookupValueController@list')->name('lookup-values.all');
		Route::put('/update/{lookupvalue}','\App\Http\Controllers\LookupValueController@update')->name('lookup-values.update');
		Route::post('/store','\App\Http\Controllers\LookupValueController@store')->name('lookup-values.store');
		Route::get('/get','\App\Http\Controllers\LookupValueController@listOptions')->name('lookup-values.get');
		Route::get('/{lookupvalue}','\App\Http\Controllers\LookupValueController@view')->name('lookup-values.view');
		Route::get('/delete/{lookupvalue}','\App\Http\Controllers\LookupValueController@destroy')->name('lookup-values.delete');
	});
