    <?php

use App\Http\Controllers\ArticleController;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/' , [ArticleController::class , 'loadMore'] );

Route::get('/{category}' , [ArticleController::class , 'loadMoreCategory'] );
Route::get('/tag/{tagname}' , [ArticleController::class , 'loadMoreTag'] );

Route::get('/all' , function(){
    $articles = Article::all()->count();
    return response()->json( [$articles] );
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


