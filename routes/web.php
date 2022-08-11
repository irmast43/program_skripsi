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
Route::group(['middleware' => 'cekauth'], function () {
    Route::get('/', function () {
        return view('dashboard');
    });

    
    Route::get('kriteria', 'App\Http\Controllers\KriteriaController@index');
    Route::get('kriteria/add', 'App\Http\Controllers\KriteriaController@create');

    Route::get('kriteria/cetak/pdf/master', 'App\Http\Controllers\KriteriaController@cetakPdf');
    Route::get('kriteria/cetak/excel/master', 'App\Http\Controllers\KriteriaController@cetakExcel');

    Route::get('alternatif/cetak/pdf/master', 'App\Http\Controllers\AlternatifController@cetakPdf');
    Route::get('alternatif/cetak/excel/master', 'App\Http\Controllers\AlternatifController@cetakExcel');

    Route::get('kriteria/hapus/{id}', 'App\Http\Controllers\KriteriaController@destroy');
    Route::get('kriteria/edit/{id}', 'App\Http\Controllers\KriteriaController@edit');
    Route::post('kriteria/store', 'App\Http\Controllers\KriteriaController@store');
    Route::post('kriteria/update', 'App\Http\Controllers\KriteriaController@update');
    Route::get('kriteria/select2/ajax', 'App\Http\Controllers\KriteriaController@select2');
    
    Route::get('alternatif/index', 'App\Http\Controllers\AlternatifController@index');
    Route::get('alternatiff/add', 'App\Http\Controllers\AlternatifController@create');
    Route::get('alternatiff/hapus/{id}', 'App\Http\Controllers\AlternatifController@destroy');
    Route::get('alternatiff/edit/{id}', 'App\Http\Controllers\AlternatifController@edit');
    Route::post('alternatiff/store', 'App\Http\Controllers\AlternatifController@store');
    Route::post('alternatiff/update', 'App\Http\Controllers\AlternatifController@update');
    Route::post('alternatiff/import', 'App\Http\Controllers\AlternatifController@import')->name('importFile.alternatif');
    
    Route::get('bobot/alternatif', 'App\Http\Controllers\BobotAlternatifController@index');
    Route::get('bobot/alternatif/edit/{id}', 'App\Http\Controllers\BobotAlternatifController@edit');
    Route::post('bobot/alternatif/update', 'App\Http\Controllers\BobotAlternatifController@update');
    
    Route::post('bobot/kriteria/store', 'App\Http\Controllers\BobotKriteriaController@store');
    Route::get('bobot/kriteria', 'App\Http\Controllers\BobotKriteriaController@index');
    
    Route::get('bobot/copras/index', 'App\Http\Controllers\CoprasController@index');
    Route::post('bobot/copras/store', 'App\Http\Controllers\CoprasController@store');
    
    Route::resource('perhitungan', 'App\Http\Controllers\PerhitunganController');
    Route::get('perhitunganCopras/index', 'App\Http\Controllers\PerhitunganCoprasController@index');
    
    Route::post('update_profile/store', 'App\Http\Controllers\UserController@update');
    
    Route::post('cetak/rangking/pdf', 'App\Http\Controllers\PerhitunganController@cetakRangkingPdf');
    Route::post('cetak/rangking/excel', 'App\Http\Controllers\PerhitunganController@cetakRangkingExcel');

    Route::post('cetak/rangking/copras/pdf', 'App\Http\Controllers\PerhitunganCoprasController@cetakRangkingPdf');
    Route::post('cetak/rangking/copras/excel', 'App\Http\Controllers\PerhitunganCoprasController@cetakRangkingExcel');
    
    
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

