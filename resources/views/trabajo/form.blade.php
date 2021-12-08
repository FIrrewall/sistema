<div class="form-row">

    <div class="form-group col-md-4">
        <select id="informe_id" name="informe_id" class="form-control">
            <option value="{{ $id}}">{{ $id}}</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Descripcion</label>
    <input type="text" class="form-control" name="descripcion" value="{{ isset($trabajo->descripcion)? $trabajo->descripcion:old('descripcion') }}" id="descripcion">
</div>

<div class="form-group">
    <label for="Foto">Imagen de trabajo realizado</label>

    @if(isset($trabajo->imagen))
    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$trabajo->imagen }}" width="100">
    @endif

    <input type="file" name="imagen" id="imagen" accept="image/*" class="form-control">
    </br>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>