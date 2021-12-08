<div class="form-row">
    <div class="form-group col-md-4">

        <select id="descargo_id" name="descargo_id" class="form-control">
            <option value="{{$id}}">{{$id}}</option>
        </select>

    </div>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Codigo</label>
    <input type="text" class="form-control" name="codigo" value="{{ isset($gasto->codigo)? $gasto->codigo:old('codigo') }}" id="codigo">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Detalle</label>
    <input type="text" class="form-control" name="detalle" value="{{ isset($gasto->detalle)? $gasto->detalle:old('detalle') }}" id="detalle">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Proyecto</label>
    <input type="text" class="form-control" name="proyecto" value="{{ isset($gasto->proyecto)? $gasto->proyecto:old('proyecto') }}" id="proyecto">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Fecha</label>
    <input type="date" class="form-control" name="fecha" value="{{ isset($gasto->fecha)? \Carbon\Carbon::parse($gasto->fecha)->format('Y-m-d'):old('fecha') }}" id="fecha">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Proveedor</label>
    <input type="text" class="form-control" name="proveedor" value="{{ isset($gasto->proveedor)? $gasto->proveedor:old('proveedor') }}" id="proveedor">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Cliente</label>
    <input type="text" class="form-control" name="cliente" value="{{ isset($gasto->cliente)? $gasto->cliente:old('cliente') }}" id="cliente">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Tipo de comprobante</label>
    <select id="tipoComprobante" name="tipoComprobante" class="form-control">
        <option value="Factura">Factura</option>
        <option value="Nota">Nota</option>
    </select>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Numero de comprobante</label>
    <input type="number" class="form-control" name="numeroComprobante" value="{{ isset($gasto->numeroComprobante)? $gasto->numeroComprobante:old('numeroComprobante') }}" id="numeroComprobante">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Monto</label>
    <input type="number" class="form-control" name="monto" value="{{ isset($gasto->monto)? $gasto->monto:old('monto') }}" id="monto">
</div>



<div class="modal-footer">
    @csrf
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>