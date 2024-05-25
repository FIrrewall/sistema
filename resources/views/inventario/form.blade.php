<div class="form-group">
    <label for="exampleFormControlInput1">Nombre del Inventario</label>
    <input type="text" class="form-control" name="descripcion" value="{{ isset($inventario->descripcion)? $inventario->descripcion:old('descripcion') }}" id="descripcion" required>
</div>
<div class="form-group">
    <label for="fecha">Fecha</label>
    <input type="date" class="form-control" name="fecha" value="{{ isset($inventario->fecha)? \Carbon\Carbon::parse($inventario->fecha)->format('Y-m-d'):old('fecha') }}" id="fecha" required>
</div>

<div class="modal-footer justify-content-between">
    @csrf
    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-outline-light">{{ $modo}}</button>
</div>