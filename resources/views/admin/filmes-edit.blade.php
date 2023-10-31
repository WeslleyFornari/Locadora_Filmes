@extends('layouts.appAdmin')

@section('content')

  <section div class="container mt-4" style="margin-left: 300px;">

        <h3>Editar Informações</h3>
    <!--FORMULARIO-->    
    <form action="{{route('admin.filme.update',['id'=>$filme->id])}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row mt-3">

        <div class="col-3 mt-1">
             <img src="{{asset($filme->capa)}}" style="height:auto; width:250px;">
        </div>

        <div class="col-4 ms-4">
            <div>
                  <p><b>Título:</b></p>
                  <input type="text" class="form-control" size="40" name="txt_titulo" value="{{$filme->titulo}}">
            </div>

            <div class="mt-3">
                <p><b>Genero:</b></p>
                <select id="" name="status" class="form-select">
                        <option value="alugar">Alugar</option>
                        <option value="indisponivel">Indisponivel</option>
                </select>
            </div>

            <div class="mt-3">
                   <p><b>Resumo:</b></p>
                    <textarea class="form-control" name="txt_resumo" rows="3" required="required">{{$filme->resumo}}</textarea>
            </div>

            <div class="mt-2">
                <p><b>Genero:</b></p>
                <select class="form-select" name="txt_genero">
                    @foreach($generos as $k => $item)
                        <option value="{{$item->tipo}}" size="25">{{$item->tipo}}</option>
                    @endforeach
                <!-- Adicione mais opções de gênero aqui -->
                </select>
            </div>

            <div class="mt-2 mb-2">
                <label for="capa" class="form-label">Avatar (URL):</label>
                <input type="file" name="img_filme">
            </div>

            <button type="submit" class="btn btn-primary mt-2">Salvar</button>
        </div>
   </form>
</div>

</section>

@endsection

  <!-- Script jS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
