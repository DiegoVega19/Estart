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

Route::get('/', function () {
    return view('home');
});




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'cargo'], function ()
{
   // Route::resource('cargo', 'App\Http\Controllers\CargoController');
    Route::DELETE('/{id}', 'App\Http\Controllers\CargoController@destroy')->name('cargo.delete');
    Route::put('/{id}', 'App\Http\Controllers\CargoController@update')->name('cargo.update');
});

Route::resource('cargo', 'App\Http\Controllers\CargoController');
Route::resource('empleado', 'App\Http\Controllers\EmpleadoController');
Route::resource('entrada', 'App\Http\Controllers\EntradaController');
Route::resource('salida', 'App\Http\Controllers\SalidaController');
Route::resource('feedback', 'App\Http\Controllers\FeedbackController');
Route::resource('receso','App\Http\Controllers\RecesoController');
Route::resource('reunion','App\Http\Controllers\ReunionController');
Route::resource('coaching', 'App\Http\Controllers\CoachingController');
Route::get('marcaReunion/ViewRecords','App\Http\Controllers\MarcaReunionController@viewMyRecords')->name('view');
Route::get('marcaReunion/MarkMeetings','App\Http\Controllers\MarcaReunionController@viewMyMeetings');
Route::get('marcaReunion/{idemp}/{idreu}','App\Http\Controllers\MarcaReunionController@createData')->name('marcaReunion.createData');
Route::get('marcaReunion/{idmarc}','App\Http\Controllers\MarcaReunionController@editarView')->name('marcaReunion.editRedirect');
Route::resource('marcaReunion', 'App\Http\Controllers\MarcaReunionController');
Route::get('marcaCoaching/ViewRecords','App\Http\Controllers\MarcaCoachingController@viewMyRecords')->name('viewC');
Route::get('marcaCoaching/MarkCoachings','App\Http\Controllers\MarcaCoachingController@viewMyCoachings');
Route::get('marcaCoaching/{idemp}/{idcoa}','App\Http\Controllers\MarcaCoachingController@createData')->name('marcaCoaching.createData');
Route::get('marcaCoaching/{idemp}','App\Http\Controllers\MarcaCoachingController@editarView')->name('marcaCoaching.editRedirect');
Route::resource('marcaCoaching', 'App\Http\Controllers\MarcaCoachingController');



