<div class="form-group">
    <label for="exampleFormControlInput1">Nombre del Inventario</label>
    <input type="text" class="form-control" name="descripcion" value="{{ isset($inventario->descripcion)? $inventario->descripcion:old('descripcion') }}" id="descripcion">
</div>
<div class="form-group">
    <label for="fecha">Fecha</label>
    <input type="date" class="form-control" name="fecha" value="{{ isset($inventario->fecha)? \Carbon\Carbon::parse($inventario->fecha)->format('Y-m-d'):old('fecha') }}" id="fecha">
</div>

<div class="modal-footer">
    @csrf
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary">{{ $modo}} datos</button>
</div>