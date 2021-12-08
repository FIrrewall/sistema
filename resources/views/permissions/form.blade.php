<div class="form-group">
    <label for="exampleFormControlInput1">Nombre del permiso</label>
    <input type="text" class="form-control" name="name" value="{{ isset($permission->name)? $permission->name:old('name') }}" id="name">
</div>


<div class="modal-footer">
    @csrf
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary">{{ $modo}} datos</button>
</div>