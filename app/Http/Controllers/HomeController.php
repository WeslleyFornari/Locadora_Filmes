<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\Genero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
    */

    // !!! OBRIGA O USUARIO A SEMPRE ESTAR LOGADO !!!
    public function __construct() 
    {
        //$this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\Support\Renderable
     * 
     */
    
// INDEX DE LOGIN
   public function index()
    {
        $is_admin = Auth::user()->is_admin;

       if($is_admin == 1){
            return redirect()->route('admin.home');
        }else{
            return redirect()->route('usuario.home');
        }
    } 

// PAGINA PRINCIPAL 
public function home()
{
    $genero = Genero::all();
    
    $acervo = Filme::inRandomOrder()->get();
    //$acervo = Filme::orderBy('titulo','asc')->get(); 
    return view('site.home', compact('genero', 'acervo'));
}    

//HOME ADMIN
    public function homeAdmin()
    {
    
        return view('admin.home');
    }

//LISTA ADMIN
    public function listaAdmin()
    {
        $genero = Genero::all();
        //$acervo = Filme::orderBy('titulo','asc')->get(); 
        $acervo = Filme::inRandomOrder()->get();
        //$acervo = Filme::orderBy('titulo','asc')->get(); 
        return view('admin.lista', compact('genero', 'acervo'));
    }

//SELECT GENERO ADMIN
    public function selectAdminGenero(Request $request){

        $generoSelect=$request->all();
        $genero = Genero::all();
        $acervo = Filme::where('genero', $generoSelect)->get();
        //$acervo = Filme::orderBy('titulo','asc')->get();        

        return view('admin.lista', compact('acervo','genero'));
    }
 // ------------------------------------------------------------------------------------------------
   
    //HOME USUARIO  AJAX
    public function homeUsuarioAjax()  {

        $genero = Genero::all();
        //$acervo = Filme::orderBy('titulo','asc')->get(); 
        $acervo = Filme::inRandomOrder()->get();
        //$acervo = Filme::orderBy('titulo','asc')->get(); 
        return view('usuario.home', compact('genero', 'acervo'));
    }

    //SELECT USUARIO -- AJAX
    public function selectUsuarioAjax(Request $request){

        $selecao = $request->all();
                
        $genero = Genero::all();  

        $acervo = Filme::query();

        if($selecao['genero'] != "")
        {
            $acervo->where('genero', $selecao['genero']);
        }
        
        if($selecao['status'] != "")
        {
            $acervo->where('status', $selecao['status']);
        }

        if($selecao['buscar'] != "")
        {
            
            $acervo->whereRaw('LOWER(titulo) LIKE ?', ['%' . $selecao['buscar'] . '%'])->get();
        }

        $acervo = $acervo->get();      
        return view('usuario.lista-filmes', compact('acervo','genero'));
    }
}
