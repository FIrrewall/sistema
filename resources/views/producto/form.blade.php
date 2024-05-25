<div class="form-group">
    <label for="exampleFormControlInput1">Codigo del producto</label>
    <input type="text" class="form-control" name="codigoProducto" value="{{ isset($producto->codigoProducto)? $producto->codigoProducto:old('codigoProducto') }}" id="codigoProducto" required>
</div>

<div class="form-group">
    <label for="exampleFormControlInput1">Descripcion</label>
    <input type="text" class="form-control" name="descripcion" value="{{ isset($producto->descripcion)? $producto->descripcion:old('descripcion') }}" id="descripcion" required>
</div>

<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-outline-light">{{$modo}}</button>
</div>