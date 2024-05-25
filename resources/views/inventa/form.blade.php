<div class="form-row">
    <div class="form-group col-md-6">
        <label for="exampleFormControlInput1">Inventario del mes</label>
        <select id="descripcion" name="descripcion" class="form-control">
            <option value="{{$mes}}">{{$mes}}</option>
        </select>
    </div>
    <div class="form-group col-md-6">
        <input type="hidden" class="form-control" name="fecha" value="{{$fecha}}" id="fecha" required>
        <input type="hidden" class="form-control" name="alojamiento_id" value="{{$idAlo}}" id="alojamiento_id" required>
    </div>
</div>

<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-outline-light">{{$modo}}</button>
</div>