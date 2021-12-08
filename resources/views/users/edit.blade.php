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
        <div class="card">
            <div class="card-body">
                <h1>
                    <center>Lista de Usuarios</center>
                </h1>
                </br>
                <div class="form-group">
                    <label for="formGroupExampleInput">Nombre Completo</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="name" value="{{ isset($user->name)? $user->name:old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Correo electronico</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{ isset($user->email)? $user->email:old('email') }}" required>
                    <small id="emailHelp" class="form-text text-muted">El correo debe contener @, numeros y caracteres</small>
                </div>
                <!--<div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
    @if($errors->has('password'))
    <span class="error texr-danger" for="input-password">{{$errors->first('password')}}</span>
    @endif
</div>-->

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

                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection