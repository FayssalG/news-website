<?php

use App\Http\Controllers\ArticleController;
use App\Models\Article;
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

Route::get('/', [ArticleController::class , 'index']);


Route::get('/{category}', [ArticleController::class , 'indexCategory']);
Route::get('/tag/{tagname}', [ArticleController::class , 'indexTag']);


Route::get('/article/{name}', [ArticleController::class , 'show']);
 
