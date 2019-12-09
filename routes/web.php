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

Route::get('/', 'PagesController@inicio')->name('inventario');

Route::get('/venta/{id}', 'PagesController@venta')->name('repuesto.venta');

Route::put('/venta/{id}', 'PagesController@confirmar')->name('venta.confirmar');

Route::post('repuestos', 'PagesController@agregar')->name('agregar');

Route::get('repuestos', 'PagesController@stock')->name('inventario');

Route::get('reporte', 'PagesController@reporte')->name('reporte');

Route::get('reporte-ventas', 'PagesController@reporteventas')->name('reporte-ventas');

Route::get('factura', 'PagesController@factura')->name('factura');

Route::post('reporte-ventas', 'PagesController@reporteventas')->name('reporte-ventas');


