<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\Genero;
use Illuminate\Http\Request;

class FilmeController extends Controller
{

// LISTAR    
    public function lista(Request $request){

        $listaGenero = Genero::all();
        $listaFilme = Filme::orderBy('titulo','asc')->get();
       
        return view('admin.filme', compact('listaGenero', 'listaFilme'));
    }

// SALVAR
    public function salvar2(Request $request){

         // Valide os dados do formulário, se necessário
      $x = $request->validate([
          'img_filme' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
          'txt_titulo'=>'required|:filmes']);
        
            // Salve a imagem no sistema de arquivos (storage/app/public)
             $imagemPath = $request->file('img_filme')->store('/img/filme');
    
        $filme=$request->except('_token');
        
        Filme:: create([
            'capa'=> $imagemPath,
            'genero'=> $filme['txt_genero'],
            'titulo'=> $filme['txt_titulo'],
            'resumo'=> $filme['txt_resumo'],
            'status'=> $filme['status'],
        ]);

        return redirect()->route('admin.filme');
    }
    
//EDIT
public function editar2(Request $request, $id){

    $filme = Filme::find($id);
    $generos = Genero::all();
   
    return view('admin.filmes-edit', compact('filme', 'generos'));
}

//UPDATE
public function update2(Request $request,$id)   {

    // Valide os dados do formulário, se necessário
    $x = $request->validate([
        'img_filme' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);

    // Apagar o imagem antiga armazenada
    $filme = Filme::find($id);
    unlink($filme->capa);
   
    // Atualiza a nova imagem no sistema de arquivos (storage/app/public)
    $imagemUpPath = $request->file('img_filme')->store('/img/filme');
    
    $data = $request->except('_token'); //recebe as informações no objeto.

    Filme::where('id',$id)->update([
        'titulo'=> $data['txt_titulo'],
        'resumo'=> $data['txt_resumo'],
        'capa'=> $imagemUpPath,
        'genero'=> $data['txt_genero'],
        'status'=> $data['status'],
    ]);
    return redirect()->route('admin.filme');
}

//DELETAR
    public function deletar(Request $request,$id)   {

        $filme = Filme::find($id);
        unlink($filme->capa);
        $filme-> delete();

        return redirect()->route('admin.filme');
}

}