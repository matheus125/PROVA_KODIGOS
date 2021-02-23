<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
use Illuminate\Http\Request;

class EstoqueController extends Controller
{
    
    public function index()
    {
        return Estoque::get();
    }

    public function store(Requeste $request)
    {
        $estoque= new Estoque;
        $estoque->create($request->all());
    }

    public function show(Estoque $estoque)
    {   
        return $estoque;
    }

    public function update(Request $request, Estoque $estoque)
    {
        $estoque->update($request->all());
    }
    
    public function destroy(Estoque $estoque)
    {
        $estoque->delete();
    }

}
