<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

//////////// rotas para usuarios logado

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    //Rota extrato
    Route::get('/extrato', function () {
        return view('extrato');
    }
    )->name('extrato');

    //Rota Seus Dados
    Route::get('/seus_dados', function () {
        return view('seus_dados');
    }
    )->name('seus_dados');

    //Rota Nova Entrada - cadastro de receita ou despesa
    Route::get('/nova_entrada', function () {
        return view('nova_entrada');
    }
    )->name('nova_entrada');
});