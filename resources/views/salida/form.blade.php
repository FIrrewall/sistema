<div class="form-row">
    <div class="form-group col-md-4">
        <input type="number" class="form-control" name="inventari_id" value="{{$id}}" id="inventari_id">
    </div>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Nombre del Proyecto</label>
    <input type="text" class="form-control" name="nombreProyecto" value="{{ isset($salida->nombreProyecto)? $salida->nombreProyecto:old('nombreProyecto') }}" id="nombreProyecto" >
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Numero de Nota</label>
    <input type="number" class="form-control" name="numeroNota" value="{{ isset($salida->numeroNota)? $salida->numeroNota:old('numeroNota') }}" id="numeroNota" >
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Fecha</label>
    <input type="date" class="form-control" name="fecha" value="{{ isset($salida->fecha)? \Carbon\Carbon::parse($salida->fecha)->format('Y-m-d'):old('fecha') }}" id="fecha">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Codigo</label>
    <input type="text" class="form-control" name="codigo" value="{{ isset($salida->codigo)? $salida->codigo:old('codigo') }}" id="codigo" >
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Descripcion</label>
    <input type="text" class="form-control" name="descripcion" value="{{ isset($salida->descripcion)? $salida->descripcion:old('descripcion') }}" id="descripcion" >
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Numero de Serie</label>
    <input type="text" class="form-control" name="numeroSerie" value="{{ isset($salida->numeroSerie)? $salida->numeroSerie:old('numeroSerie') }}" id="numeroSerie" >
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Cantidad</label>
    <input type="number" class="form-control" name="cantidad" value="{{ isset($salida->cantidad)? $salida->cantidad:old('cantidad') }}" id="cantidad" >
</div>
<div class="modal-footer">
    @csrf
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>