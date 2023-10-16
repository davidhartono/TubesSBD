<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\IngredientController;

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

Route::get('/', [HalamanController::class, 'index']);
Route::get('/create', [HalamanController::class, 'create']);
Route::get('/search', [HalamanController::class, 'search']);
Route::get('/result', [HalamanController::class, 'result']);
Route::get('/create/recipe', [HalamanController::class, 'recipe']);
Route::get('/create/tips', [HalamanController::class, 'tips']);

Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/recipes', [ProfileController::class, 'recipes']);
Route::get('/profile/tips', [ProfileController::class, 'tips']);
Route::get('/profile/cooksnaps', [ProfileController::class, 'cooksnaps']);
Route::get('/profile/{user}/edit', [ProfileController::class, 'edit']);
Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile/{id}/image', [ProfileController::class, 'deleteImage'])->name('users.delete_image');
Route::delete('/profile/{id}', [ProfileController::class, 'destroy']);


Route::resource('activity', ActivityController::class);

Route::resource('ingredients', IngredientController::class);

Route::resource('challenges', ChallengeController::class);

Route::resource('recipes', RecipeController::class);

Route::resource('tips', TipsController::class);


Route::post('/recipecomment', [CommentController::class, 'recipe'])->name('comments.recipe');
Route::post('/tipscomment', [CommentController::class, 'tips'])->name('comments.tips');
Route::delete('/recipe-comments/{id}', [CommentController::class, 'destroyRecipeComment'])->name('recipe-comments.destroy');
Route::delete('/tip-comments/{id}', [CommentController::class, 'destroyTipComment'])->name('tip-comments.destroy');


Route::get('/login', [SessionController::class, 'index']);
Route::post('/login/user', [SessionController::class, 'login']);
Route::get('/logout', [SessionController::class, 'logout']);
Route::post('/register/create', [SessionController::class, 'create']);
Route::get('/register', [SessionController::class, 'register']);


Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/users', [AdminController::class, 'user']);
    Route::get('/recipes', [AdminController::class, 'recipe']);
    Route::get('/ingredients', [AdminController::class, 'ingredient']);
    Route::get('/tips', [AdminController::class, 'tips']);
    Route::get('/challenges', [AdminController::class, 'challenge']);
    Route::get('/comments', [AdminController::class, 'comment']);
    Route::get('/activity', [AdminController::class, 'activity']);
});
