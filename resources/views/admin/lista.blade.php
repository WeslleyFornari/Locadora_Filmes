@extends('layouts.appAdmin')

@section('content')
<section class="container">
   
            <form action="{{route('admin.home.select')}}" method="get">
                <div class="row mt-3">
                    <div class="col-3 p-2 text-end">
                        <h4>Filtrar por Gênero</h4>
                    </div>

                    <div class="col-2 text-center">
                        <select class="form-select" name="genero">
                            <option value="#">Selecione</option>
                            @foreach($genero as $k => $item)
                                <option value="{{$item->tipo}}">{{$item->tipo}}</option>
                            @endforeach
                        <!-- Adicione mais opções de gênero aqui -->
                        </select>
                    </div>

                    <div class="col-1 text-end">
                        <button type="submit" class="btn btn-primary">OK</button>
                    </div>  

                    <div class="col-1">
                    <a href="{{route('admin.home.limpar')}}" class="btn btn-secondary">Limpar</a>
                    </div>  
                </div>          
           </form>    
</section>

<section class="container" id="listaFilmes">

    <div class="row">
            <!-- Card dos Filmes LISTA -->
        @foreach($acervo as $k => $item)
        <div class="col-md-3 mt-4">
            <div class="card">
                <img src="{{asset($item->capa)}}" class="card-img-top" style="height:auto; width:200px;">
                <div class="card-body">
                    <h5 class="card-title">{{$item->titulo}}</h5>
                    <p class="card-text">{{$item->resumo}}</p>
                    <p class="card-text"><strong>Gênero: </strong>{{$item->genero}}</p>                   

                    <p class="card-text"><strong>Classificação: </strong>

                    @for($i=1; $i <= $item->classificacao; $i++)
                        <i class="fa-solid fa-star"></i>
                    @endfor
                    </p> 

                </div>
            </div>
        </div>
        @endforeach

    </div>     

</section>
@endsection



