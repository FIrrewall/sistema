@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="form-group">
    <label for="formGroupExampleInput">Nombre Completo</label>
    <input type="text" class="form-control" id="formGroupExampleInput" name="name" required>
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Correo electronico</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
    <small id="emailHelp" class="form-text text-muted">El correo debe contener @, numeros y caracteres</small>
</div>
<div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
    @if($errors->has('password'))
    <span class="error texr-danger" for="input-password">{{$errors->first('password')}}</span>
    @endif
</div>

<div class="form-group">
    <table class="table table-striped">
        <tbody>
            @can('users_indexJefe')
            @foreach($roles as $id=>$role)
            @if($role != 'AdminSistema')
            <tr>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="roles[]" value="{{$id}}">
                    </div>
                </td>
                <td>
                    {{$role}}
                </td>
            </tr>
            @endif
            @endforeach
            @endcan

            @can('users_destroy')
            @foreach($roles as $id=>$role)
            <tr>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="roles[]" value="{{$id}}">
                    </div>
                </td>
                <td>
                    {{$role}}
                </td>
            </tr>
            @endforeach
            @endcan
        </tbody>
    </table>
</div>

<div class="modal-footer justify-content-between">
    <a href="{{ url('/users') }}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Atras</a>
    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
</div>