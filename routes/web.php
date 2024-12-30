<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('chat',[ChatController::class,'index'])->name("chats");
    Route::get('chat/{id}',[ChatController::class,'chat'])->name("chat");
    Route::get('guardar_mensaje/{id}',[ChatController::class,'guardar_mensaje'])->name("guardar_mensaje");
    Route::get('obtener_chat',[ChatController::class,'obtener_chat'])->name("obtener_chat");
    Route::post('nuevo_chat',[ChatController::class,'nuevo_chat'])->name("nuevo_chat");
});
