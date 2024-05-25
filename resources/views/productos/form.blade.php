<div class="form-group">
    <label for="exampleFormControlInput1">Nombre del Producto</label>
    <input type="text" class="form-control" name="nombre" value="{{ isset($pro->nombre)? $pro->nombre:old('nombre') }}" id="nombre" required>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Precio del producto</label>
    <input type="number" class="form-control" name="precio" value="{{ isset($pro->precio)? $pro->precio:old('precio') }}" id="precio" required>
</div>

<div class="modal-footer justify-content-between">
    @csrf
    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-outline-light">{{$modo}}</button>
</div>