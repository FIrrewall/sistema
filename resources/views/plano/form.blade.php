<div class="form-row">
    <div class="form-group col-md-6">
        <label for="exampleFormControlInput1">ID Informe</label>
        <select id="informe_id" name="informe_id" class="form-control">
            <option value="{{$id}}">{{$resul}}</option>
        </select>
    </div>

    <div class="form-group col-md-3">
        <label for="exampleFormControlInput1">Nombre de Ubicacion</label>
        <input type="text" class="form-control" name="nombre" value="{{ isset($plano->nombre)? $plano->nombre:old('nombre') }}" id="nombre" required>
    </div>

    <div class="form-group col-md-3">
        <label for="exampleFormControlInput1">Tipo de plano (ALARMAS/CCTV)</label>
        <select id="tipoPlano" name="tipoPlano" class="form-control">
            <option value="CCTV">CCTV</option>
            <option value="ALARMAS">ALARMAS</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="Foto">Imagen del plano</label>
    @if(isset($plano->planta))
    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$plano->planta }}" width="100">
    @endif
    <input type="file" name="planta" id="planta" accept="image/*" class="form-control" required>
    </br>
</div>

<div class="modal-footer justify-content-between">
    @csrf
    <a href="{{ url('/planosAgencias/'.$id) }}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Atras</a>
    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> {{$modo}}</button>
</div>