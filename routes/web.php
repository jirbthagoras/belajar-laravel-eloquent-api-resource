<?php

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/categories/{id}", function ($id) {
    $category = Category::findOrFail($id);
    return new \App\Http\Resources\CategoryResource($category);
});

Route::get("/categories", function () {
    $category = Category::all();
    return \App\Http\Resources\CategoryResource::collection($category);
});

Route::get("/categories-custom", function () {
    $category = Category::all();
    return new \App\Http\Resources\CategoryCollection($category);
});

Route::get('/product/{id}', function ($id) {
    $products = Product::find($id);
    return new \App\Http\Resources\ProductsResource($products);
});
