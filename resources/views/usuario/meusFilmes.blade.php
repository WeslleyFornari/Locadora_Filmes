@extends('layouts.appUsuario')

@section('content')

<section class="container mt-4">
    <div class="row">

        <!-- Lista de Filmes em Tabela -->
        <div class="col-md-10">
            <h3>Lista de Filmes</h3>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Status</th>
                        <th scope="col">Capa</th>
                        <th scope="col">Título</th>
                        <th scope="col">Gênero</th>
                        <th scope="col">Data_Locação</th>
                        <th scope="col">Data_Devolução</th>
                        <th scope="col">Nota</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>

                <!--BODY-->
                <tbody id="listaFilmes">
                @foreach($locacoes as $k => $item)

                    <tr>

                        <td>{{$item->id}}</td>

                        @if($item->status == 'alugado')
                            <td><button type="button" class="btn btn-success">ALUGADO</button></td>
                        @else
                            <td><button type="button" class="btn btn-danger">DEVOLVIDO</button></td>
                        @endif
                    
                        <td><img src="{{asset($item->filme->capa)}}"class="img-fluid" height="auto" width="70px"></td>
                        <td>{{$item->filme->titulo}}</td>
                        <td>{{$item->filme->genero}}</td>
                        <td>{{$item->data_retirada->format('d/m/Y')}}</td>

                        @if($item->status == 'alugado')
                            <td></td>
                        @else
                            <td>{{$item->data_entrega->format('d/m/Y')}}</td>
                        @endif

                    <!-- FORM NOTA -->
                        <form action="{{route('usuario.devolver',['id'=>$item->id],['id2'=>$item->filme->id])}}" method="post">
                        @csrf

                        @if($item->status == 'alugado')
                        <td>
                            <input type="radio" name="nota" value="1">1
                            <input type="radio" name="nota" value="2">2
                            <input type="radio" name="nota" value="3">3
                            <input type="radio" name="nota" value="4">4
                            <input type="radio" name="nota" value="5">5
                        </td>
                        <td><button type="submit" class="btn btn-secondary mt-2">Devolver</button></td>
                       
                        @else
                            <td>{{$item->nota}}</td>
                        @endif

                        </form>
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
