<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    
// LISTA ADMIN
    public function lista(Request $request){

        $lista = Genero::all();
        return view('admin.genero', compact('lista'));
    }
//CREATE ADMIN
    public function salvar(Request $request){

        $genero=$request->except('_token');        
        Genero:: create([

            'tipo'=> $genero['txt_genero']
            
        ]);
        return redirect()->route('admin.genero');
    }
//EDIT ADMIN
    public function editar($id){

        $genero = Genero::findOrFail($id);
        $lista = Genero::all();
        
        return view('admin.generos-edit', compact('lista', 'genero'));
    }
//UPDATE ADMIN
    public function update(Request $request){

        Genero::findOrFail($request-> id)->update($request->all());
        
        return redirect()->route('admin.genero');

    }
//DELETAR ADMIN
    public function deletar(Request $request,$id)   {

        $genero = Genero::find($id);
        $genero-> delete();

        return redirect()->route('admin.genero');
    }
// LISTA ADMIN


}