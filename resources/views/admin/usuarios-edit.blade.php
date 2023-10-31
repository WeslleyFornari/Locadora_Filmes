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

<!-- Formulário Edição de Usuario -->
    <h3>Editar Usuário</h3> 
        <form action="#" method="post" enctype="multipart/form-data">
        @csrf   
                
             <div class="col-md-10 mt-4">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Perfil</th>
                        <th scope="col">Password</th>
                        <th scope="col">Confirmation</th>
                        <th scope="col">Ação</th>
                        
                    </tr>
                </thead>

                <!--BODY-->
                <tbody>

                    <tr>
                        <td>{{$user->id}}</td>
            <!--NOME-->              
                        <td><input type="text" size="50"class="form-control" name="nome" required="required"  value="{{$user->name}}"></td>
            <!--EMAIL-->
                        <td><input type="email" size="50"class="form-control @error('email') is-invalid @enderror" name="email" required="required" value="{{$user->email}}"></td>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                        @enderror
            <!--PERFIL-->
                        <td><select style="width: 120px;" name="is_admin" class="form-control">
                            
                                    <option value="0">Usuário</option>
                                    <option value="1">Administrador</option>
                            </select>
                        </td>
             <!--PASSWORD-->
                        <td><input type="password" class="form-control @error('password') is-invalid @enderror" id="senha" name="password"></td>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                        </span>
                        @enderror
            <!--CONFIRMATION-->
                        <td><input type="password" class="form-control" id="confirmar_senha" name="password_confirmation" required></td>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
            <!--ATUALIZAR-->
                        <td><button type="submit" class="btn btn-warning">Atualizar</button></td>
                        
                    </tr>
               </tbody>
              
            </table>
        </form>
</div>   

</section>
                   
@endsection

<!-- Inclua os scripts do Bootstrap e do jQuery -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
