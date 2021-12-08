<div class="form-row">
    <div class="form-group col-md-4">

        <select id="descargo_id" name="descargo_id" class="form-control">
            <option value="{{$id}}">{{$id}}</option>
        </select>
        
    </div>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Codigo</label>
    <input type="text" class="form-control" name="codigo" value="{{ isset($pasaje->codigo)? $pasaje->codigo:old('codigo') }}" id="codigo">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Detalle</label>
    <input type="text" class="form-control" name="detalle" value="{{ isset($pasaje->detalle)? $pasaje->detalle:old('detalle') }}" id="detalle">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Fecha</label>
    <input type="date" class="form-control" name="fecha" value="{{ isset($pasaje->fecha)? \Carbon\Carbon::parse($pasaje->fecha)->format('Y-m-d'):old('fecha') }}" id="fecha">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Transporte</label>
    <input type="text" class="form-control" name="transporte" value="{{ isset($pasaje->transporte)? $pasaje->transporte:old('transporte') }}" id="transporte">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Origen</label>
    <input type="text" class="form-control" name="origen" value="{{ isset($pasaje->origen)? $pasaje->origen:old('origen') }}" id="origen">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Destino</label>
    <input type="text" class="form-control" name="destino" value="{{ isset($pasaje->destino)? $pasaje->destino:old('destino') }}" id="destino">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">cliente</label>
    <input type="text" class="form-control" name="cliente" value="{{ isset($pasaje->cliente)? $pasaje->cliente:old('cliente') }}" id="cliente">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">proyecto</label>
    <input type="text" class="form-control" name="proyecto" value="{{ isset($pasaje->proyecto)? $pasaje->proyecto:old('proyecto') }}" id="proyecto">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Monto</label>
    <input type="number" class="form-control" name="monto" value="{{ isset($pasaje->monto)? $pasaje->monto:old('monto') }}" id="monto">
</div>


<div class="modal-footer">
    @csrf
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>