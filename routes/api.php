<?php

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



use App\Http\Controllers\ProductoController;

Route::get('productos', [ProductoController::class, 'index']); // Obtener todos los productos
Route::post('productos', [ProductoController::class, 'store']); // Crear un nuevo producto
Route::get('productos/{id}', [ProductoController::class, 'show']); // Obtener un producto específico
Route::put('productos/{id}', [ProductoController::class, 'update']); // Actualizar un producto específico
Route::delete('productos/{id}', [ProductoController::class, 'destroy']); // Eliminar un producto específico



