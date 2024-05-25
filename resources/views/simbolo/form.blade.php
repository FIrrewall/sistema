
<div class="form-group">
    <label for="exampleFormControlInput1">Nombre del simbolo</label>
    <input type="text" class="form-control" name="nombreSimbolo" value="{{ isset($simbolo->nombreSimbolo)? $simbolo->nombreSimbolo:old('nombreSimbolo') }}" id="nombreSimbolo" required>
</div>

<div class="form-group">
    <label for="Foto">Imagen</label>

    @if(isset($simbolo->simbolo))
    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$simbolo->simbolo }}" width="100">
    @endif

    <input type="file" name="simbolo" id="simbolo" accept="image/*" class="form-control">
    </br>
</div>

<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-outline-light">{{$modo}}</button>
</div>



