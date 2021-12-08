<div class="form-row">
    <div class="form-group col-md-4">

        <select id="descargo_id" name="descargo_id" class="form-control">
            <option value="{{$id}}">{{$id}}</option>
        </select>
        
    </div>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Codigo</label>
    <input type="text" class="form-control" name="codigo" value="{{ isset($caja->codigo)? $caja->codigo:old('codigo') }}" id="codigo">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Detalle</label>
    <input type="text" class="form-control" name="detalle" value="{{ isset($caja->detalle)? $caja->detalle:old('detalle') }}" id="detalle">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Cliente del proyecto</label>
    <input type="text" class="form-control" name="clienteProyecto" value="{{ isset($caja->clienteProyecto)? $caja->clienteProyecto:old('clienteProyecto') }}" id="clienteProyecto">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Fecha</label>
    <input type="date" class="form-control" name="fecha" value="{{ isset($caja->fecha)? \Carbon\Carbon::parse($caja->fecha)->format('Y-m-d'):old('fecha') }}" id="fecha">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Proveedor</label>
    <input type="text" class="form-control" name="proveedor" value="{{ isset($caja->proveedor)? $caja->proveedor:old('proveedor') }}" id="proveedor">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Monto</label>
    <input type="number" class="form-control" name="monto" value="{{ isset($caja->monto)? $caja->monto:old('monto') }}" id="monto">
</div>


<div class="modal-footer">
    @csrf
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>