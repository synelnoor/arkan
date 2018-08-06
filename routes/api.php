<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('barangs', 'BarangAPIController');
Route::resource('orders', 'OrderAPIController');
Route::resource('orderItems', 'OrderItemAPIController');
Route::resource('pembayarans', 'PembayaranAPIController');
Route::resource('purchases', 'PurchaseAPIController');
Route::resource('categories', 'CategoryAPIController');
Route::resource('tokos', 'TokoAPIController');

Route::resource('item_stocks', 'ItemStockAPIController');

Route::resource('stock_ins', 'StockInAPIController');

Route::resource('stock_outs', 'StockOutAPIController');

Route::resource('detail_stock_ins', 'DetailStockInAPIController');

Route::resource('detail_stock_outs', 'DetailStockOutAPIController');

Route::resource('stocks', 'StockAPIController');

Route::resource('log_stocks', 'LogStockAPIController');