@extends('layouts.appAdmin')

@section('content')

<div class="container mt-5">
    <div class="row">
        <!-- Formulário de Adição/Edição de Gêneros -->
        <div class="col-md-4">
            <h3>Adicionar Gênero</h3>
            <form action="{{route('admin.genero.salvar')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="genero" class="form-label">Gênero:</label>
                    <input type="text" class="form-control" name="txt_genero" id="genero" placeholder="Digite o gênero">
                </div>
                
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>

        <!-- Lista de Gêneros -->
        <div class="col-md-8">
            <h3>Lista de Gêneros</h3>

            <table class="table">

            <tbody id="listaFilmes">    
                @foreach($lista as $k => $item)

                <tr>
                     <td>{{$item->tipo}}</td>
                     <td><a href="{{route('admin.genero.edit',['id'=>$item->id])}}" class="btn btn-primary edit-btn">Editar</a></td>
                     <td><a href="{{route('admin.genero.deletar',['id'=>$item->id])}}" class="btn btn-danger edit-btn">Deletar</a></td>
                </tr>
                @endforeach
            </tbody>    
        </div>
    </div>
</div>
@endsection

<!-- Inclua os scripts do Bootstrap e do jQuery -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


