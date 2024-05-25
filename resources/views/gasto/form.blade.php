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
            <option value="CG - {{$codigoGasto}}">CG - {{$codigoGasto}}</option>
        </select>
    </div>
    <div class="form-group col-md-4">
        <label for="exampleFormControlInput1">Fecha</label>
        <input type="date" class="form-control" name="fecha" value="{{ isset($gasto->fecha)? \Carbon\Carbon::parse($gasto->fecha)->format('Y-m-d'):old('fecha') }}" id="fecha" required>
    </div>
    <div class="form-group col-md-4">
        <label for="exampleFormControlInput1">Detalle</label>
        <input type="text" class="form-control" name="detalle" value="{{ isset($gasto->detalle)? $gasto->detalle:old('detalle') }}" id="detalle" required>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
        <label for="exampleFormControlInput1">Proyecto</label>
        <input type="text" class="form-control" name="proyecto" value="{{ isset($gasto->proyecto)? $gasto->proyecto:old('proyecto') }}" id="proyecto" required>
    </div>

    <div class="form-group col-md-4">
        <label for="exampleFormControlInput1">Proveedor</label>
        <input type="text" class="form-control" name="proveedor" value="{{ isset($gasto->proveedor)? $gasto->proveedor:old('proveedor') }}" id="proveedor" required>
    </div>

    <div class="form-group col-md-4">
        <label for="exampleFormControlInput1">Cliente</label>
        <input type="text" class="form-control" name="cliente" value="{{ isset($gasto->cliente)? $gasto->cliente:old('cliente') }}" id="cliente" required>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-4">
        <label for="exampleFormControlInput1">Tipo de comprobante</label>
        <select id="tipoComprobante" name="tipoComprobante" class="form-control">
            <option value="Factura">Factura</option>
            <option value="Nota">Nota</option>
        </select>
    </div>
    <div class="form-group col-md-4">
        <label for="exampleFormControlInput1">Numero de comprobante</label>
        <input type="number" class="form-control" name="numeroComprobante" value="{{ isset($gasto->numeroComprobante)? $gasto->numeroComprobante:old('numeroComprobante') }}" id="numeroComprobante" required>
    </div>
    <div class="col-md-4">
        <label for="exampleFormControlInput1">Monto</label>
        <div class="input-group mb-2">
            <input type="number" step="0.01" class="form-control" id="inlineFormInputGroup" name="monto" value="{{ isset($gasto->monto)? $gasto->monto:old('monto') }}" required>
            <div class="input-group-prepend">
                <div class="input-group-text">Bs.</div>
            </div>
        </div>
    </div>
</div>

<div class="modal-footer justify-content-between">
    <a href="{{ url('/registroGastos/'.$id) }}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Atras</a>
    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> {{$modo}}</button>
</div>