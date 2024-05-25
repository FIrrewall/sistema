<div class="form-row">
    <div class="form-group col-md-6">
        <label for="exampleFormControlInput1">Producto</label>
        <select id="producto_id" name="producto_id" class="form-control">
            @foreach($producto as $pro)
            <option value="{{$pro->id}}">{{$pro->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="exampleFormControlInput1">Cantidad</label>
        <input type="number" class="form-control" name="cantidad" value="" id="cantidad" required>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-4">
        <input type="hidden" class="form-control" name="inventario_id" value="{{$idIn}}" id="inventario_id" required>
    </div>
    <div class="form-group col-md-4">
        <input type="hidden" class="form-control" name="fecha" value="{{$fec}}" id="fecha" required>
    </div>
    <div class="form-group col-md-4">
        <input type="hidden" class="form-control" name="hora" value="{{$hora}}" id="hora" required>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
        <input type="hidden" class="form-control" name="entrada" value="0" id="entrada" required>
    </div>
    <div class="form-group col-md-4">
        <input type="hidden" class="form-control" name="salida" value="0" id="salida" required>
    </div>
    <div class="form-group col-md-4">
        <input type="hidden" class="form-control" name="stock" value="0" id="stock" required>
    </div>
</div>

<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-outline-light">{{$modo}}</button>
</div>