<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TaskController;


Route::get('/', [PageController::class, 'index']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/contact', [PageController::class, 'contact']);
Route::get('/todo', [PageController::class, 'todo']);

// Task routes
Route::post('/todos', [TaskController::class, 'store']);
Route::get('/todos/{id}/delete', [TaskController::class, 'delete']);