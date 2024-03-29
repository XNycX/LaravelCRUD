<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Products

Route::get('/product', [ProductController::class, 'show']);
Route::post('/products', [ProductController::class, 'create']);
Route::put('/product/{id}', [ProductController::class, 'update']);
Route::delete('/product/{id}', [ProductController::class, 'delete']);
// Route::findOne('/product/{id}', [ProductController::class, 'findOne']);
// User

Route::get('/user', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'create']);
Route::put('/user/{id}', [UserController::class, 'update']);
Route::delete('/user/{id}', [UserController::class, 'delete']);
// Route::findOne('/user/{id}', [UserController::class, 'findOne']);

// Task

Route::get('/task', [TaskController::class, 'show']);
Route::post('/tasks', [TaskController::class, 'create']);
Route::put('/task/{id}', [TaskController::class, 'update']);
Route::delete('/task/{id}', [TaskController::class, 'delete']);

Route::get('/task/{userId}', [TaskController::class, 'getAllByUser']);


// Post

route::get('/posts', [PostsController::class, 'show']);
route::post('/posts', [PostController::class, 'create']);
route::put('/post/{id}', [PostsController::class, 'update']);
route::delete('/post/{id}', [PostsController::class, 'delete']);
// route::findOne('/post/{id}', [PostController::class, 'findOne']);

route::get('/posts_middleware', [PostsController::class, 'handle']) -> middleware('fsd');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group([
    'middleware' => 'jwt.auth'
], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);
});