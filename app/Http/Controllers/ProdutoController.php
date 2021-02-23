<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        return Produto::get();
    }

    public function store(Requeste $request)
    {
        $produto= new Produto;
        $produto->create($request->all());
    }

    public function show(Produto $produto)
    {   
        return $produto;
    }

    public function update(Request $request, Produto $produto)
    {
        $produto->update($request->all());
    }

    public function destroy(Produto $produto){
        $produto->delete();
    }
    
   
}