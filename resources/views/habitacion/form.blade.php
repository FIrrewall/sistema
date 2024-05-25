<div class="form-row">
    <div class="form-group col-md-6">
        <label for="exampleFormControlInput1">Numero de habitacion</label>
        <input type="number" class="form-control" name="numhabitacion" value="{{ isset($habi->numhabitacion)? $habi->numhabitacion:old('numhabitacion') }}" id="numhabitacion" required>
    </div>
    <div class="form-group col-md-6">
        <label for="inputState">Preferencia</label>
        <select id="preferencias" name="preferencias" class="form-control">
            <option value="SIMPLE">SIMPLE</option>
            <option value="CON BAÑO PRIVADO">CON BAÑO PRIVADO</option>
        </select>
    </div>
</div>


<div class="form-row">
    <div class="form-group col-md-6">
        <input type="hidden" class="form-control" name="alojamiento_id" value="{{$id}}" id="alojamiento_id" required>
    </div>
    <div class="form-group col-md-6">
        <label for="exampleFormControlInput1">Estado</label>
        <select id="estadoH" name="estadoH" class="form-control">
            <option value="LIBRE" selected>LIBRE</option>
            <option value="OCUPADO">OCUPADO</option>
            <option value="SUCIO">SUCIO</option>
        </select>
    </div>
</div>


<div class="modal-footer justify-content-between">
    @csrf
    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-outline-light">{{$modo}}</button>
</div>

