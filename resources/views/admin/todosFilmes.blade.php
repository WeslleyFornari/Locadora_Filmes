@extends('layouts.appAdmin')

@section('content')

<section class="container mt-4">
    <div class="row">

        <!-- Lista de Filmes em Tabela -->
        <div class="col-md-12">
            <h3>Lista de Locações</h3>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Status</th>
                        <th scope="col">Nota</th>
                        <th scope="col">Capa</th>
                        <th scope="col">Título</th>
                        <th scope="col">Gênero</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Data_Locação</th>
                        <th scope="col">Data_Devolução</th>
                        
                    </tr>
                </thead>

                <!--BODY-->
                <tbody id="listaFilmes">
                @foreach($locacoes as $k => $item)
                    <tr>  
                        <td>
                        @if($item->status == 'alugado')
                          <button type="button" class="btn btn-success">ALUGADO</button>
                        @else
                            <button type="button" class="btn btn-danger">DEVOLVIDO</button>
                        @endif
                    </td>

                    <td>    
                        @for($i=1; $i <= $item->nota; $i++)
                           <i class="fa-solid fa-star"></i>
                        @endfor
                    </td>
                    
                        <td><img src="{{asset($item->filme->capa)}}"class="img-fluid" height="auto" width="70px"></td>
                        <td><a href="{{route('admin.locacoes.filme',['id'=>$item->filme->id])}}">{{$item->filme->titulo}}</a></td>
                        <td>{{$item->filme->genero}}</td>

                        <td>{{$item->usuarios->name}}</td>

                        <td>{{$item->data_retirada->format('d/m/Y')}}</td>

                        @if($item->status == 'alugado')
                        <td></td>
                        @else
                        <td>{{$item->data_entrega->format('d/m/Y')}}</td>
                        @endif

                        
                    </tr>
                @endforeach  
               </tbody>
            </table>
        </div>
    </div>
</section>

@endsection

<!-- Inclua os scripts do Bootstrap e do jQuery -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
