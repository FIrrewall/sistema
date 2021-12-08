<div class="form-row">

    <div class="form-group col-md-4">
        <select id="informe_id" name="informe_id" class="form-control">
            <option value="{{$id}}">{{$id}}</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Numero de Usuario</label>
    <input type="number" class="form-control" name="numeroUsuario" value="{{ isset($usuario->numeroUsuario)? $usuario->numeroUsuario:old('numeroUsuario') }}" id="numeroUsuario">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Nombre</label>
    <input type="text" class="form-control" name="nombreUsuario" value="{{ isset($usuario->nombreUsuario)? $usuario->nombreUsuario:old('nombreUsuario') }}" id="nombreUsuario">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Area</label>
    <input type="text" class="form-control" name="area" value="{{ isset($usuario->area)? $usuario->area:old('area') }}" id="area">
</div>

<div class="modal-footer">
    @csrf
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>