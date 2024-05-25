<div class="form-row">
    <div class="form-group col-md-2">
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
    <div class="form-group col-md-6">
        <label for="exampleFormControlInput1">Nombre de Solicitante</label>
        <select class="form-control" name="nombreSolicitante" id="nombreSolicitante">
            <option value="{{$user}}">{{$user}}</option>
        </select>
        <!--<input type="text" class="form-control" name="nombreSolicitante" value="{{ isset($descargo->nombreSolicitante)? $descargo->nombreSolicitante:old('nombreSolicitante') }}" id="nombreSolicitante" required>-->
    </div>
    <div class="form-group col-md-4">
        <label for="exampleFormControlInput1">CI</label>
        <input type="text" class="form-control" name="ci" value="{{ isset($descargo->ci)? $descargo->ci:old('ci') }}" id="ci" required>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-4">
        <label for="exampleFormControlInput1">Cargo</label>
        <!--<input type="text" class="form-control" name="cargo" value="{{ isset($descargo->cargo)? $descargo->cargo:old('cargo') }}" id="cargo" required>-->
        <select class="form-control" name="cargo" id="cargo">
            <option value="TECNICO">TECNICO</option>
            <option value="ADMINISTRACION">ADMINISTRACION</option>
        </select>
    </div>

    <div class="form-group col-md-4">
        <label for="exampleFormControlInput1">Nombre de Destinatario</label>
        <input type="text" class="form-control" name="nombreDestinatario" value="{{ isset($descargo->nombreDestinatario)? $descargo->nombreDestinatario:old('nombreDestinatario') }}" id="nombreDestinatario" required>
    </div>
    <div class="form-group col-md-4">
        <label for="fecha">Fecha</label>
        <input type="date" class="form-control" name="fecha" value="{{ isset($descargo->fecha)? \Carbon\Carbon::parse($descargo->fecha)->format('Y-m-d'):old('fecha') }}" id="fecha" required>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="fecha">Fecha Desde</label>
        <input type="date" class="form-control" name="fechaDesde" value="{{ isset($descargo->fechaDesde)? \Carbon\Carbon::parse($descargo->fechaDesde)->format('Y-m-d'):old('fechaDesde') }}" id="fechaDesde" required>
    </div>
    <div class="form-group col-md-6">
        <label for="fecha">Fecha Hasta</label>
        <input type="date" class="form-control" name="fechaHasta" value="{{ isset($descargo->fechaHasta)? \Carbon\Carbon::parse($descargo->fechaHasta)->format('Y-m-d'):old('fechaHasta') }}" id="fechaHasta" required>
    </div>
</div>

<div class="modal-footer justify-content-between">
    @csrf
    <a href="{{ url('/descargos') }}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Atras</a>
    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> {{$modo}}</button>
</div>