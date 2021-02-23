<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\ProdutoController;

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
   
   /* $user = new \App\Models\User();

    $user->name = 'matheus Souza Santos';

    $user->email = 'martheus@gmail.com';
    
    $user->password = bcrypt(value: '123456');
    
    $user->save();

    return view(view:'welcome');
    */

    /*$estoque = new \App\Models\Estoque();

    $estoque->quantidade = '100';
    
    $estoque->save();

    return view(view:'welcome');
    */

   /* $produto = new \App\Models\Produto();

    $produto->id = '18';
    $produto->nome = 'farinha';
    $produto->descricao = 'Alimento do dia';
    $produto->Uni_Medida = 'peso';
    
    $produto->save();
    */
    return view(view:'welcome');

});

/*Route::get('hello/{quantidade}', function($quantidade){
    return view(view:'hello');
});*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::apiResource('/estoque', EstoqueController::class);

//Route::apiResource('/produto', ProdutoController::class);
