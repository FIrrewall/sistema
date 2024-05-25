<div class="form-group">
    <label for="exampleFormControlInput1">Nombre del permiso</label>
    <input type="text" class="form-control" name="name" value="{{ isset($permission->name)? $permission->name:old('name') }}" id="name" required >
</div>


<div class="modal-footer justify-content-between">
    @csrf
    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-outline-light">{{ $modo}}</button>
</div>