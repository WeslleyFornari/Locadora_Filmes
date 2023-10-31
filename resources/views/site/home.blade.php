@extends('layouts.app')

@section('content')

<section class="container" id="listaFilmes">

    <div class="row">
            <!-- Card dos Filmes LISTA -->
        @foreach($acervo as $k => $item)
        <div class="col-md-3 mt-4" style="height: auto; text-align: center;">
            <div class="card">
                <img src="{{asset($item->capa)}}" class="card-img-top" style="height:auto; width:200px;">
                <div class="card-body">
                    <h5 class="card-title"><b>{{$item->titulo}}</b></h5>
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



