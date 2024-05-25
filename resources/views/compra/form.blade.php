<div class="form-group">
    <label for="exampleFormControlInput1">Costo Total</label>
    <input type="text" class="form-control" name="costototal" value="{{ isset($compra->costototal)? $compra->costototal:old('costototal') }}" id="costototal" required>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Fcha</label>
    <input type="date" class="form-control" name="fecha" value="{{ isset($compra->fecha)? $compra-fecha:old('fecha') }}" id="fecha" required>
</div>

<div class="modal-footer justify-content-between">
    @csrf
    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-outline-light">{{$modo}}</button>
</div>