<div class="form-group">
    <label for="exampleFormControlInput1">Id Inventario</label>
    <input type="text" class="form-control" name="inventari_id" value="{{ $id }}" id="inventari_id">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Codigo del Producto</label>
    <input type="text" class="form-control" name="codigoProducto" value="{{ isset($existente->codigoProducto)? $existente->codigoProducto:old('codigoProducto') }}" id="codigoProducto">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Descripcion</label>
    <input type="text" class="form-control" name="descripcion" value="{{ isset($existente->descripcion)? $existente->descripcion:old('descripcion') }}" id="descripcion">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Cantidad</label>
    <input type="number" class="form-control" name="existenciaInicial" value="{{ isset($existente->existenciaInicial)? $existente->existenciaInicial:old('existenciaInicial') }}" id="existenciaInicial">
</div>

<div class="modal-footer">
    @csrf
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary">{{ $modo}} datos</button>
</div>