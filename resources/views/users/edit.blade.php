@extends('adminlte::page')
@section('title','Actualizar datos')
@section('content')
<div class="container">

    <form action="{{ url('/users/'.$user->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PATCH')}}

        @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card card-info">
            <div class="card-header">
                <table width=100%>
                    <tr>
                        <td align="left" width=5%>
                            <h2><i class="fas fa-user"></i></h2>
                        </td>
                        <td align="center">
                            <h2>ACTUALIZAR USUARIO</h2>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="formGroupExampleInput">Nombre Completo</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="name" value="{{ isset($user->name)? $user->name:old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Correo electronico</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{ isset($user->email)? $user->email:old('email') }}" required>
                    <small id="emailHelp" class="form-text text-muted">El correo debe contener @, numeros y caracteres</small>
                </div>

                <div class="form-group">
                    <table class="table table-striped">
                        <tbody>
                            @foreach($roles as $id=>$role)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="roles[]" value="{{$id}}" {{$user->roles->contains($id) ? 'checked' : ''}}>
                                    </div>
                                </td>
                                <td>
                                    {{$role}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer justify-content-between">
                    <a href="{{ url('/users') }}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Atras</a>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Actualizar</button>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection