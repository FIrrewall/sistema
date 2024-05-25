<div class="form-row">
    <div class="form-group col-md-2">
        <label for="exampleFormControlInput1">ID Descargo</label>
        <select id="descargo_id" name="descargo_id" class="form-control">
            <option value="{{$id}}">{{$id}}</option>
        </select>
    </div>
    <div class="form-group col-md-2">
        <label for="exampleFormControlInput1">Codigo</label>
        <select id="codigo" name="codigo" class="form-control">
            <option value="CP - {{$codigoPasaje}}">CP - {{$codigoPasaje}}</option>
        </select>
    </div>

    <div class="form-group col-md-6">
        <label for="exampleFormControlInput1">Detalle</label>
        <input type="text" class="form-control" name="detalle" value="{{ isset($pasaje->detalle)? $pasaje->detalle:old('detalle') }}" id="detalle" required>
    </div>
    <div class="form-group col-md-2">
        <label for="exampleFormControlInput1">Fecha</label>
        <input type="date" class="form-control" name="fecha" value="{{ isset($pasaje->fecha)? \Carbon\Carbon::parse($pasaje->fecha)->format('Y-m-d'):old('fecha') }}" id="fecha" required>
    </div>
</div>
<div class="form-row">
    
    <div class="form-group col-md-4">
        <label for="exampleFormControlInput1">Transporte</label>
        <input type="text" class="form-control" name="transporte" value="{{ isset($pasaje->transporte)? $pasaje->transporte:old('transporte') }}" id="transporte" required>
    </div>
    <div class="form-group col-md-4">
        <label for="exampleFormControlInput1">Origen</label>
        <input type="text" class="form-control" name="origen" value="{{ isset($pasaje->origen)? $pasaje->origen:old('origen') }}" id="origen" required>
    </div>
    <div class="form-group col-md-4">
        <label for="exampleFormControlInput1">Destino</label>
        <input type="text" class="form-control" name="destino" value="{{ isset($pasaje->destino)? $pasaje->destino:old('destino') }}" id="destino" required>
    </div>
</div>
<div class="form-row">
    
    <div class="form-group col-md-4">
        <label for="exampleFormControlInput1">cliente</label>
        <input type="text" class="form-control" name="cliente" value="{{ isset($pasaje->cliente)? $pasaje->cliente:old('cliente') }}" id="cliente" required>
    </div>
    <div class="form-group col-md-4">
        <label for="exampleFormControlInput1">proyecto</label>
        <input type="text" class="form-control" name="proyecto" value="{{ isset($pasaje->proyecto)? $pasaje->proyecto:old('proyecto') }}" id="proyecto" required>
    </div>
    <div class="col-md-4">
        <label for="exampleFormControlInput1">Monto</label>
        <div class="input-group mb-2">
            <input type="number" step="0.01" class="form-control" id="inlineFormInputGroup" name="monto" value="{{ isset($pasaje->monto)? $gasto->pasaje:old('monto') }}" required>
            <div class="input-group-prepend">
                <div class="input-group-text">Bs.</div>
            </div>
        </div>
    </div>
</div>

<div class="modal-footer justify-content-between">
    @csrf
    <a href="{{ url('/registroPasajes/'.$id) }}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Atras</a>
    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> {{$modo}}</button>

</div>