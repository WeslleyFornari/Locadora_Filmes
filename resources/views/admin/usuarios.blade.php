@extends('layouts.appAdmin')

@section('content')

<section class="container mt-4">
    <div class="row">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
        <!-- Formulário de Cadastro/Edição de Filmes -->
        <div class="col-md-4">
            <h3>Cadastrar Usuário</h3> 
            <form action="{{route('admin.usuario.salvar')}}" method="post" enctype="multipart/form-data">
             @csrf   
                
                <div class="mt-3 mb-3">
                   
                    <label for="titulo" class="form-label pt-1">Nome:</label>
                    <input type="text" class="form-control" name="nome" required="required" placeholder="Nome Completo">
                
                <div class="mt-3 mb-3">
                   
                    <label for="titulo" class="form-label pt-1">Email:</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" required="required" placeholder="Digite seu email">
                
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                </div>

                <div class="mt-3 mb-3">
                     <label for="senha" class="form-label" >Senha:</label>
                     <input type="password" class="form-control @error('password') is-invalid @enderror" id="senha" name="password" required>
         
                     @error('password')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                    
                <div class="mt-3 mb-3">
                    <label for="confirmar_senha" class="form-label">Confirmar Senha:</label>
                    <input type="password" class="form-control" id="confirmar_senha" name="password_confirmation" required>
                </div>
                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                <div class="mt-3 mb-3">
                    <label for="titulo" class="form-label pt-1">Perfil:</label>
                    <select id="is_admin" name="is_admin" class="form-control">
                            
                            <option value="0">Usuário</option>
                            <option value="1">Administrador</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>

        <!-- Lista de Filmes em Tabela -->
        <div class="col-md-8">
            <h3>Lista de Usuarios</h3>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Perfil</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Deletar</th>
                    </tr>
                </thead>

                <!--BODY-->
                <tbody id="listaFilmes">
                @foreach($users as $k => $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->is_admin}}</td>
                        
                        <td><a href="{{route('admin.usuario.edit',['id'=>$item->id])}}" class="btn btn-primary">Editar</a></td>
                        <td><a href="{{route('admin.usuario.deletar',['id'=>$item->id])}}" class="btn btn-secondary">Deletar</a></td>
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
