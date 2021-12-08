<div class="form-row">
    <div class="form-group col-md-4">

        <select id="descargo_id" name="descargo_id" class="form-control">
            <option value="{{$id}}">{{$id}}</option>
        </select>
        
    </div>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Codigo</label>
    <input type="text" class="form-control" name="codigo" value="{{ isset($viatico->codigo)? $viatico->codigo:old('codigo') }}" id="codigo">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Detalle</label>
    <input type="text" class="form-control" name="detalle" value="{{ isset($viatico->detalle)? $viatico->detalle:old('detalle') }}" id="detalle">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Fecha</label>
    <input type="date" class="form-control" name="fecha" value="{{ isset($viatico->fecha)? \Carbon\Carbon::parse($viatico->fecha)->format('Y-m-d'):old('fecha') }}" id="fecha">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Costo de Alojamiento</label>
    <input type="number" class="form-control" name="alojamiento" value="{{ isset($viatico->alojamiento)? $viatico->alojamiento:old('alojamiento') }}" id="alojamiento">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Costo de Desayuno</label>
    <input type="number" class="form-control" name="desayuno" value="{{ isset($viatico->desayuno)? $viatico->desayuno:old('desayuno') }}" id="desayuno">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Costo de Almuerzo</label>
    <input type="number" class="form-control" name="almuerzo" value="{{ isset($viatico->almuerzo)? $viatico->almuerzo:old('almuerzo') }}" id="almuerzo">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Costo de Cena</label>
    <input type="number" class="form-control" name="cena" value="{{ isset($viatico->cena)? $viatico->cena:old('cena') }}" id="cena">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Gastos varios</label>
    <input type="number" class="form-control" name="gastosVarios" value="{{ isset($viatico->gastosVarios)? $viatico->gastosVarios:old('gastosVarios') }}" id="gastosVarios">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Detalle de gastos</label>
    <input type="text" class="form-control" name="detalleGastosVarios" value="{{ isset($viatico->detalleGastosVarios)? $viatico->detalleGastosVarios:old('detalleGastosVarios') }}" id="detalleGastosVarios">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Costo de Transporte</label>
    <input type="number" class="form-control" name="transporte" value="{{ isset($viatico->transporte)? $viatico->transporte:old('transporte') }}" id="transporte">
</div>
<div class="modal-footer">
    @csrf
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>