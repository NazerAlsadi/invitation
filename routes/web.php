<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PrefixController;

use App\Http\Controllers\CategoryController;

use App\Http\Controllers\InternamlInvetationController;

use App\Http\Controllers\ExInviteController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/prefixes', [PrefixController::class, 'index']);

Route::get('/prefixes/create', [PrefixController::class, 'create']);

Route::post('/prefixes/store', [PrefixController::class, 'store']);

Route::get('/prefixes/{prefix}/edit', [PrefixController::class, 'edit']);

Route::patch('/prefixes/{prefix}/update', [PrefixController::class, 'update'])->name('prefix.update');

Route::delete('/prefixes/{prefix}/delete', [PrefixController::class, 'destroy'])->name('prefix.delete');

//=========================================================================================================

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/categories/create', [CategoryController::class, 'create']);

Route::post('/categories/store', [CategoryController::class, 'store']);

Route::get('/categories/{category}/edit', [CategoryController::class, 'edit']);

Route::patch('/categories/{category}/update', [CategoryController::class, 'update'])->name('category.update');

Route::delete('/categoties/{category}/delete', [CategoryController::class, 'destroy'])->name('category.delete');

//==============================================================================================================

Route::get('/internalInvetation', [InternamlInvetationController::class, 'index']);

Route::get('/internalInvetation/create', [InternamlInvetationController::class, 'create']);

Route::post('/internalInvetation/store', [InternamlInvetationController::class, 'store']);

Route::get('/internalInvetation/{inInvit}/edit', [InternamlInvetationController::class, 'edit']);

Route::patch('/internalInvetation/{inInvit}/update', [InternamlInvetationController::class, 'update'])->name('ininvite.update');

Route::delete('/internalInvetation/{inInvit}/delete', [InternamlInvetationController::class, 'destroy'])->name('ininvite.delete');

Route::get('/emailVerify/{inInvit}', [InternamlInvetationController::class, 'verify']);
//==========================================================================================================================================

Route::get('/exInvetation', [ExInviteController::class, 'index']);

Route::get('/exInvetation/create', [ExInviteController::class, 'create']);

Route::post('/exInvetation/store', [ExInviteController::class, 'store']);

Route::get('/exInvetation/{exInvit}/edit', [ExInviteController::class, 'edit']);

Route::patch('/exInvetation/{exInvit}/update', [ExInviteController::class, 'update'])->name('exinvite.update');

Route::delete('/exInvetation/{exInvit}/delete', [ExInviteController::class, 'destroy'])->name('exinvite.delete');

//==========================================================================================================================================