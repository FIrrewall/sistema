<div class="form-row">
    <div class="form-group col-md-6">
        <label for="exampleFormControlInput1">Producto</label>
        <select id="reservacion_id" name="reservacion_id" class="form-control">
            @foreach($reservacion as $reser)
            @if($reser->id == $id)
            <option value="{{$id}}">{{$reser->nombre}} {{$reser->paterno}}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-2">
        <input type="hidden" class="form-control" name="fecha" value="{{\Carbon\Carbon::parse($fecha)->format('Y-m-d')}}" id="fecha" required>
    </div>
</div>

<div class="modal-footer justify-content-between">
    @csrf
    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-outline-light">{{$modo}}</button>
</div>