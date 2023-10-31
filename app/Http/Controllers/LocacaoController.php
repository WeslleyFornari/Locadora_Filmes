<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\Locacao;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocacaoController extends Controller
{
    
// ALUGAR
    public function alugar(Request $request, $id){

        $filme = Filme::find($id);
        $filme->status = 'indisponivel';
        $filme->save();

        $data_retirada = Carbon::now();
        $userLogado = Auth::user();

        Locacao:: create([

            'id_filme'=> $filme['id'],
            'data_retirada'=> $data_retirada->format('Y-m-d'),
            'id_usuario'=> $userLogado['id'],
        ]);

        return redirect()->route('usuario.meusFilmes');       
    }  

// DEVOLUÇÂO                                   id locação
    public function devolver(Request $request, $id){

        $data=$request->except('_token');    
        $data_entrega = Carbon::now();
        $status = 'disponivel';

        Locacao::where('id',$id)->update([
            'data_entrega'=> $data_entrega,
            'status'=> $status,
            'nota' => $data['nota'],
        ]);

        $status2 = 'alugar';

        $filme = Locacao::find($id);

        $lista = Locacao::where('id_filme', $filme['id_filme'])->get();
        $classificaco = round($lista->sum('nota') / $lista->count(),0);

        Filme::where('id',$filme['id_filme'])->update([
            'status'=>$status2,
            'classificacao'=> $classificaco,
        ]);

        return redirect()->route('usuario.meusFilmes');
    }
    
  // MEUS FILMES
    public function meusFilmes(Request $request){

        $userLogado = Auth::user();
        $locacoes = Locacao::where('id_usuario', $userLogado['id'])->get();

        return view('usuario.meusFilmes', compact('locacoes'));

    }

    // TODOS FILMES
    public function locacoesAll(Request $request){

       $locacoes = Locacao::orderBy('data_entrega','asc')->get();

        return view('admin.todosFilmes', compact('locacoes'));
    }
// LISTAR FILME
    public function listarFilme(Request $request, $id){

        $filme = Filme::find($id);
       // $lista = Locacao::where('id_filme', $filme['id'])->get();

        return view('admin.resumoFilme', compact('filme'));
    }


    
        


       

 
    

}
