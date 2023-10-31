@extends('layouts.appUsuario')

@section('content')
<section class="container">
   
        <div class="row mt-4">
            
            <!-- STATUS-->
                    <div class="col-1 ms-3 p-2">
                        <h4>Status</h4>
                    </div>
               
                    <div class="col-2">
                        <select class="form-select" id="status" name="status">
                             <option value="">Selecione</option>
                             <option value="indisponivel" >Indisponivel</option>
                             <option value="alugar" >Alugar</option>
                        
                        </select>
                    </div>

            <!-- GENERO-->
                    <div class="col-1 p-2">
                        <h4>Gênero</h4>
                    </div>

                    <div class="col-2">
                        <select class="form-select" id="genero" name="genero">
                             <option value="">Selecione</option>
                        @foreach($genero as $k => $item)
                            <option value="{{$item->tipo}}" >{{$item->tipo}}</option>
                        @endforeach
                        
                        </select>
                    </div>

               <!-- PROCURAR-->
                    <div class="col-1 p-2">
                        <h4>Buscar</h4>
                    </div>
                    <div class="col-3">
                            <input type="text" class="form-control" id="buscar" name="nome" placeholder="Digite o filme que deseja">
                    </div>                    
        </div>          
           
</section>

<section class="container" id="lista-Filmes">
    @include('usuario.lista-filmes')
</section>

@endsection

@section('script')
<!-- Script AJAX JQUERY -->
<script>
$(document).ready(function() {
    
    // Use o evento "change" para detectar a mudança de seleção no primeiro select
    $("#status").change(function() {
        enviarSelecao();
    });
    // Use o evento "change" para detectar a mudança de seleção no segundo select
    $("#genero").change(function() {
        enviarSelecao();
    });

    $("#buscar").on('input', function() {
        enviarSelecao();
  
    });
    // Função para enviar os dados selecionados para Laravel usando AJAX
    function enviarSelecao() {
        var valorSelect1 = $("#status").val();
        var valorSelect2 = $("#genero").val();
        var valorSelect3 = $("#buscar").val().toLowerCase();

        console.log(valorSelect1);
        console.log(valorSelect2);
        console.log(valorSelect3);
    
        // Envie os valores para a rota em Laravel usando AJAX
        $.ajax({
            url: "/usuario/select/ajax",
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                status: valorSelect1,
                genero: valorSelect2,
                buscar: valorSelect3
            },
            success: function(response) {
                $("#lista-Filmes").html(response);
                console.log(response);
            },
            error: function(error) {
                // Lide com erros aqui
                console.error(error);
            },
            complete: function () {
                // Código a ser executado após a conclusão da solicitação, independentemente de sucesso ou erro
                // Exemplo: Ocultar o indicador de carregamento
            }
        });
    }
});

</script>
@endsection







