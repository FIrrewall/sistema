<div class="form-group">
    <label for="departamento">Departamento</label>
    <select class="form-control" name="departamento" id="departamento">
        <option value="La Paz">La Paz</option>
        <option value="Oruro">Oruro</option>
        <option value="Potosi">Potosi</option>
        <option value="Cochabamba">Cochabamba</option>
        <option value="Tarija">Tarija</option>
        <option value="Sucre">Sucre</option>
        <option value="Santa Cruz">Santa Cruz</option>
        <option value="Beni">Beni</option>
        <option value="Pando">Pando</option>
    </select>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Nombre de Solicitante</label>
    <input type="text" class="form-control" name="nombreSolicitante" value="{{ isset($descargo->nombreSolicitante)? $descargo->nombreSolicitante:old('nombreSolicitante') }}" id="nombreSolicitante">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Cargo</label>
    <input type="text" class="form-control" name="cargo" value="{{ isset($descargo->cargo)? $descargo->cargo:old('cargo') }}" id="cargo">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Nombre de Destinatario</label>
    <input type="text" class="form-control" name="nombreDestinatario" value="{{ isset($descargo->nombreDestinatario)? $descargo->nombreDestinatario:old('nombreDestinatario') }}" id="nombreDestinatario">
</div>
<div class="form-group">
    <label for="fecha">Fecha</label>
    <input type="date" class="form-control" name="fecha" value="{{ isset($descargo->fecha)? \Carbon\Carbon::parse($descargo->fecha)->format('Y-m-d'):old('fecha') }}" id="fecha">
</div>
<div class="form-group">
    <label for="fecha">Fecha Desde</label>
    <input type="date" class="form-control" name="fechaDesde" value="{{ isset($descargo->fechaDesde)? \Carbon\Carbon::parse($descargo->fechaDesde)->format('Y-m-d'):old('fechaDesde') }}" id="fechaDesde">
</div>
<div class="form-group">
    <label for="fecha">Fecha Hasta</label>
    <input type="date" class="form-control" name="fechaHasta" value="{{ isset($descargo->fechaHasta)? \Carbon\Carbon::parse($descargo->fechaHasta)->format('Y-m-d'):old('fechaHasta') }}" id="fechaHasta">
</div>

<div class="modal-footer">
    @csrf
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary">{{ $modo}} datos</button>
</div>