<div class="form-row">
    <div class="form-group col-md-10">

        <select id="informe_id" name="informe_id" class="form-control">
            <option value="{{$id}}">{{$resul}}</option>
        </select>
        
    </div>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Nombre del Equipo</label>
    <input type="text" class="form-control" name="nombreEquipo" value="{{ isset($inAlarma->nombreEquipo)? $inAlarma->nombreEquipo:old('nombreEquipo') }}" id="nombreEquipo" required>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Cantidad</label>
    <input type="number" class="form-control" name="cantidad" value="{{ isset($inAlarma->cantidad)? $inAlarma->cantidad:old('cantidad') }}" id="cantidad" required>
</div>

<div class="modal-footer justify-content-between">
    @csrf
    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-outline-light">{{$modo}}</button>
</div>