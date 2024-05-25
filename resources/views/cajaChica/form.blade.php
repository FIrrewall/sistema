<div class="form-row">
    <div class="form-group col-md-2">
        <label for="exampleFormControlInput1">Nº de Descargo</label>
        <select id="descargo_id" name="descargo_id" class="form-control">
            <option value="{{$id}}">Descargo Nº{{$id}}</option>
        </select>
    </div>

    <div class="form-group col-md-2">
        <label for="exampleFormControlInput1">Codigo</label>
        <select id="codigo" name="codigo" class="form-control">
            <option value="CJC - {{$codigoCaja}}">CJC - {{$codigoCaja}}</option>
        </select>
    </div>

    <div class="form-group col-md-4">
        <label for="exampleFormControlInput1">Detalle</label>
        <input type="text" class="form-control" name="detalle" value="{{ isset($caja->detalle)? $caja->detalle:old('detalle') }}" id="detalle" required>
    </div>
    <div class="form-group col-md-4">
        <label for="exampleFormControlInput1">Cliente del proyecto</label>
        <input type="text" class="form-control" name="clienteProyecto" value="{{ isset($caja->clienteProyecto)? $caja->clienteProyecto:old('clienteProyecto') }}" id="clienteProyecto" required>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-4">
        <label for="exampleFormControlInput1">Fecha</label>
        <input type="date" class="form-control" name="fecha" value="{{ isset($caja->fecha)? \Carbon\Carbon::parse($caja->fecha)->format('Y-m-d'):old('fecha') }}" id="fecha" required>
    </div>
    <div class="form-group col-md-4">
        <label for="exampleFormControlInput1">Proveedor</label>
        <input type="text" class="form-control" name="proveedor" value="{{ isset($caja->proveedor)? $caja->proveedor:old('proveedor') }}" id="proveedor" required>
    </div>
    <div class="col-md-4">
        <label for="exampleFormControlInput1">Monto</label>
        <div class="input-group mb-2">
            <input type="number" step="0.01" class="form-control" id="inlineFormInputGroup" name="monto" value="{{ isset($caja->monto)? $caja->monto:old('monto') }}" required>
            <div class="input-group-prepend">
                <div class="input-group-text">Bs.</div>
            </div>
        </div>
    </div>
</div>


<div class="modal-footer justify-content-between">
    <a href="{{ url('/cajaChica/'.$id) }}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Atras</a>
    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> {{$modo}}</button>
</div>