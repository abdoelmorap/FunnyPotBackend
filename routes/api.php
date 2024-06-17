<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\CartController;

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('phoneAuth', 'phoneAuth');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});

Route::controller(ItemsController::class)->group(function () {
    Route::get('items', 'index'); 
    Route::get('home', 'home'); 
    Route::get('items/{id}', 'getDetails');
    Route::get('item/filtered', 'filtered'); 

}); 

Route::controller(CartController::class)->group(function () {
    Route::get('cart', 'getCart');  
    Route::post('cart', 'addItemToCart');  


}); 