<div class="form-row">

    <div class="form-group col-md-4">

        <select id="informe_id" name="informe_id" class="form-control">
            <option value="{{ $id}}">{{ $id}}</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Nombre de Ubicacion</label>
    <input type="text" class="form-control" name="nombre" value="{{ isset($plano->nombre)? $plano->nombre:old('nombre') }}" id="nombre">
</div>

<div class="form-group">
    <label for="Foto">Imagen del plano</label>

    @if(isset($plano->planta))
    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$plano->planta }}" width="100">
    @endif

    <input type="file" name="planta" id="planta" accept="image/*" class="form-control">
    </br>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>