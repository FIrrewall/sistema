<div class="form-row">

    <div class="form-group col-md-4">
        
        <select id="informe_id" name="informe_id" class="form-control">
            <option value="{{ $id}}">{{ $id}}</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Nombre</label>
    <input type="text" class="form-control" name="nombre" value="{{ isset($contacto->nombre)? $contacto->nombre:old('nombre') }}" id="nombre">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Telefono o Celular</label>
    <input type="number" class="form-control" name="telefono" value="{{ isset($contacto->telefono)? $contacto->telefono:old('telefono') }}" id="telefono">
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>
