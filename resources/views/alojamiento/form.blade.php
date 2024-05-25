<div class="form-row">
    <div class="form-group col-md-6">
        <label for="exampleFormControlInput1">Nombre del Alojamiento</label>
        <input type="text" class="form-control" name="nombreA" value="{{ isset($aloja->nombreA)? $aloja->nombreA:old('nombreA') }}" id="nombreA" required>
    </div>
    <div class="form-group col-md-6">
        <label for="exampleFormControlInput1">Numero de Habitaciones</label>
        <input type="number" class="form-control" name="canthabitacion" value="{{ isset($aloja->canthabitacion)? $aloja->canthabitacion:old('canthabitacion') }}" id="canthabitacion" required>
    </div>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Direccion</label>
    <input type="text" class="form-control" name="direccion" value="{{ isset($aloja->direccion)? $aloja->direccion:old('direccion') }}" id="direccion" required>
</div>

<div class="modal-footer justify-content-between">
    @csrf
    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-outline-light">{{$modo}}</button>
</div>