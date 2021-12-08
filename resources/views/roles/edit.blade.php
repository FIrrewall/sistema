@extends('adminlte::page')
@section('title','Actualizar datos')
@section('content')
<div class="container">

    <form action="{{ url('/roles/'.$role->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PATCH')}}
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nombre del rol</label>
                    <input type="text" class="form-control" name="name" value="{{ isset($role->name)? $role->name:old('name') }}" id="name">
                </div>

                <table class="table table-striped">
                    <tbody>
                        @foreach($permissions as $id => $permission)
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{$id}}" {{$role->permissions->contains($id) ? 'checked' : ''}}>
                                </div>
                            </td>
                            <td>
                                {{$permission}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="modal-footer">
                    @csrf
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Actualizar datos</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection