<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\WordExportController;
use Illuminate\Support\Facades\Route;



Route::get('/', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');
Route::get('/export-word/{orderId}/{templateId}', [WordExportController::class, 'generateWord'])->name('generate.word');

Route::get('/templates/create', [TemplateController::class, 'create'])->name('templates.create');
Route::post('/templates/store', [TemplateController::class, 'store'])->name('templates.store');
