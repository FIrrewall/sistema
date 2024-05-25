<div class="form-row">

    <div class="form-group col-md-10">
        
        <select id="informe_id" name="informe_id" class="form-control">
            <option value="{{ $id}}">{{$resul}}</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Nombre</label>
    <input type="text" class="form-control" name="nombre" value="{{ isset($contacto->nombre)? $contacto->nombre:old('nombre') }}" id="nombre" required>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Telefono o Celular</label>
    <input type="number" class="form-control" name="telefono" value="{{ isset($contacto->telefono)? $contacto->telefono:old('telefono') }}" id="telefono" required>
</div>

<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-outline-light">{{$modo}}</button>
</div>
