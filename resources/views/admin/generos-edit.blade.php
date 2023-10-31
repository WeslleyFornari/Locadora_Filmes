@extends('layouts.appAdmin')

@section('content')

<div class="container mt-5">
    <div class="row">
        <!-- Formulário de Adição/Edição de Gêneros -->
        <div class="col-md-4">
            <h3>Editando: ({{ $genero->tipo }})</h3>
        </div>

        <!-- Lista de Gêneros -->
        <div class="col-md-4">
            <h3>Editando o Genero</h3>
            
            <form action="{{route('admin.genero.update', ['id'=>$genero->id])}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="genero" class="form-label">Gênero:</label>
                    <input type="text" class="form-control" name="tipo" id="genero" value="{{ $genero->tipo }}" placeholder="Digite o gênero">
                </div>
                
                <button type="submit" class="btn btn-primary">Editar</button>
            </form>
        </div>
    </div>
</div>
@endsection

<!-- Inclua os scripts do Bootstrap e do jQuery -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



