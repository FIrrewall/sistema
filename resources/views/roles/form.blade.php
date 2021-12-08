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
                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{$id}}">
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
    <button type="submit" class="btn btn-primary">{{ $modo}} datos</button>
</div>