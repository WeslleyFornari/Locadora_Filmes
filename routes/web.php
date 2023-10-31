<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocacaoController;
use Illuminate\Support\Facades\Auth;

Auth::routes();
// PAGINA INICIAL
Route::get('/', [HomeController::class,'home']);

//Route::get('/adminLogin', [HomeController::class,'homeAdmin']);

// ROTA APOS LOGIN
Route::get('/home', [HomeController::class,'index'])->name('home');

// ADMINISTRADORES
Route::middleware('auth')->prefix('admin/')->name('admin.')->group(function () {

    Route::get('/', [HomeController::class,'homeAdmin'])->name('home');
    Route::get('/lista', [HomeController::class,'listaAdmin'])->name('lista');
    Route::get('/lista/select/', [HomeController::class, 'selectAdminGenero'])->name('home.select');
    Route::get('/lista/limpar', [HomeController::class,'listaAdmin'])->name('home.limpar');
    
    Route::get('/genero', [GeneroController::class, 'lista'])->name('genero');
    Route::post('/genero/salvar', [GeneroController::class, 'salvar'])->name('genero.salvar');
    Route::get('/genero/edit/{id}', [GeneroController::class, 'editar'])->name('genero.edit');
    Route::post('/genero/update/{id}', [GeneroController::class, 'update'])->name('genero.update');
    Route::get('/deletar/{id}', [GeneroController::class,'deletar'])->name('genero.deletar');
    
    Route::get('/filme', [FilmeController::class, 'lista'])->name('filme');
    Route::post('/filme/salvar', [FilmeController::class, 'salvar2'])->name('filme.salvar');
    Route::get('/deletar2/{id}', [FilmeController::class,'deletar'])->name('filme.deletar');
    Route::get('/filme/edit/{id}', [FilmeController::class, 'editar2'])->name('filme.edit');
    Route::post('/filme/update/{id}', [FilmeController::class, 'update2'])->name('filme.update');

    Route::get('/usuarios', [UserController::class,'listaUsuarios'])->name('usuarios');
    Route::post('/usuario/salvar', [UserController::class,'salvar'])->name('usuario.salvar');
    Route::get('//usuario/deletar/{id}', [UserController::class,'deletar'])->name('usuario.deletar');
    Route::get('/usuario/edit/{id}', [UserController::class, 'editar'])->name('usuario.edit');

    Route::get('/locacoes', [LocacaoController::class,'locacoesAll'])->name('locacoes');
    Route::get('/locacoes/filme/{id}', [LocacaoController::class,'listarFilme'])->name('locacoes.filme');
});

// USUARIOS
Route::middleware('auth')->prefix('usuario/')->name('usuario.')->group(function () {

    Route::get('/home', [HomeController::class,'homeUsuarioAjax'])->name('home');
    Route::post('/select/ajax', [HomeController::class, 'selectUsuarioAjax'])->name('select.ajax');
    
    Route::get('/home/select/', [HomeController::class, 'selectUsuario'])->name('home.select');
    Route::get('/home/limpar', [HomeController::class,'HomeUsuario'])->name('home.limpar');

    Route::get('/filme/alugar/{id}', [LocacaoController::class, 'alugar'])->name('alugar');
    Route::post('/filme/devolver/{id}', [LocacaoController::class, 'devolver'])->name('devolver');

    Route::get('/meusfilmes', [LocacaoController::class, 'meusFilmes'])->name('meusFilmes');

});




