@extends('layouts.appAdmin')

@section('content')

<section class="container mt-4">
    <div class="row">

        <!-- Formulário de Cadastro/Edição de Filmes -->
        <div class="col-md-4">
            <h3>Cadastrar/Editar Filme</h3> 
            <form action="{{route('admin.filme.salvar')}}" method="post" enctype="multipart/form-data">
             @csrf   
                <div class="mt-3 mb-1">
                    <label for="capa" class="form-label">Capa do Filme (URL):</label>
                    <input type="file" name="img_filme" required="required">
  
                </div>

                <div class="mt-3 mb-3">
                   
                    <label for="titulo" class="form-label pt-1">Título:</label>
                    <input type="text" class="form-control" name="txt_titulo" required="required" placeholder="Título do filme">
                </div>

                <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <select id="" name="status" class="form-select">
                        <option value="alugar">Alugar</option>
                        <option value="indisponivel">Indisponivel</option>
                </select>
                </div>
                
                <div class="mb-3">
                    <label for="genero" class="form-label">Gênero:</label>
                    <select name="txt_genero" id="" class="form-select">
                            <option value="#">Selecione</option>
                        @foreach($listaGenero as $k => $item)
                            <option value="{{$item->tipo}}">{{$item->tipo}}</option>
                        @endforeach
                    </select>
                   
                </div>

                <div class="mb-3">
                    <label for="resumo" class="form-label">Resumo:</label>
                    <textarea class="form-control" name="txt_resumo" rows="3" required="required" placeholder="Resumo do filme"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>

        <!-- Lista de Filmes em Tabela -->
        <div class="col-md-8">
            <h3>Lista de Filmes</h3>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Status</th>
                        <th scope="col">Capa</th>
                        <th scope="col">Título</th>
                        <th scope="col">Gênero</th>
                        <th scope="col">Resumo</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Deletar</th>
                    </tr>
                </thead>

                <!--BODY-->
                <tbody id="listaFilmes">
                @foreach($listaFilme as $k => $item)
                    <tr>
                        @if($item->status == 'alugar')
                            <td><button type="button" class="btn btn-success">AL</button></td>
                        @else
                            <td><button type="button" class="btn btn-danger">IN</button></td>
                        @endif
                    
                        <td><img src="{{asset($item->capa)}}"class="img-fluid" height="auto" width="70px"></td>
                        <td>{{$item->titulo}}</td>
                        <td>{{$item->genero}}</td>
                        <td>{{$item->resumo}}</td>
                        
                        <td><a href="{{route('admin.filme.edit',['id'=>$item->id])}}" class="btn btn-primary">Editar</a></td>
                        <td><a href="{{route('admin.filme.deletar',['id'=>$item->id])}}" class="btn btn-secondary">Deletar</a></td>
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
