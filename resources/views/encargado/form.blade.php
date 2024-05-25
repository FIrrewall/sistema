<div class="form-row">
    <div class="form-group col-md-6">
        <label for="exampleFormControlInput1">Nombre</label>
        <input type="text" class="form-control" name="nombreE" value="{{ isset($encar->nombrE)? $encar->nombreE:old('nombrE') }}" id="nombrE" required>
    </div>
    <div class="form-group col-md-6">
        <label sfor="exampleFormControlInput1">Apellido Paterno</label>
        <input type="text" class="form-control" name="paternoE" value="{{ isset($encar->paternoE)? $encar->paternoE:old('paternoE') }}" id="paternoE" required>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="exampleFormControlInput1">Apellido materno</label>
        <input type="text" class="form-control" name="maternoE" value="{{ isset($encar->maternoE)? $encar->maternoE:old('maternoE') }}" id="maternoE" required>
    </div>
    <div class="form-group col-md-6">
        <label for="exampleFormControlInput1">CI</label>
        <input type="text" class="form-control" name="ciE" value="{{ isset($encar->ciE)? $encar->ciE:old('ciE') }}" id="ciE" required>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="exampleFormControlInput1">Nº celular</label>
        <input type="number" class="form-control" name="celularE" value="{{ isset($encar->celularE)? $encar->celularE:old('celularE') }}" id="celularE" required>
    </div>
    <div class="form-group col-md-6">
        <label for="exampleFormControlInput1">Nombre del Alojamiento</label>
        <select id="alojamiento_id" name="alojamiento_id" class="form-control">
            @foreach($aloja as $alo)
            <option value="{{$alo->id}}">{{$alo->nombreA}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="exampleFormControlInput1">Usuario</label>
        <select id="users_id" name="users_id" class="form-control">
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="modal-footer justify-content-between">

    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-outline-light">{{$modo}}</button>
</div>