<div class="form-row">
    <div class="form-group col-md-4">
        <input type="number" class="form-control" name="inventari_id" value="{{ $id}}" id="inventari_id">
    </div>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Numero de Factura</label>
    <input type="number" class="form-control" name="numeroFactura" value="{{ isset($entrada->numeroFactura)? $entrada->numeroFactura:old('numeroFactura') }}" id="numeroFactura" >
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Numero de Nota</label>
    <input type="number" class="form-control" name="numeroNota" value="{{ isset($entrada->numeroNota)? $entrada->numeroNota:old('numeroNota') }}" id="numeroNota" >
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Fecha</label>
    <input type="date" class="form-control" name="fecha" value="{{ isset($entrada->fecha)? \Carbon\Carbon::parse($entrada->fecha)->format('Y-m-d'):old('fecha') }}" id="fecha">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Codigo</label>
    <input type="text" class="form-control" name="codigo" value="{{ isset($entrada->codigo)? $entrada->codigo:old('codigo') }}" id="codigo" >
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Descripcion</label>
    <input type="text" class="form-control" name="descripcion" value="{{ isset($entrada->descripcion)? $entrada->descripcion:old('descripcion') }}" id="descripcion" >
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Numero de Serie</label>
    <input type="text" class="form-control" name="numeroSerie" value="{{ isset($entrada->numeroSerie)? $entrada->numeroSerie:old('numeroSerie') }}" id="numeroSerie" >
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Cantidad</label>
    <input type="number" class="form-control" name="cantidad" value="{{ isset($entrada->cantidad)? $entrada->cantidad:old('cantidad') }}" id="cantidad" >
</div>
<div class="modal-footer">
    @csrf
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>