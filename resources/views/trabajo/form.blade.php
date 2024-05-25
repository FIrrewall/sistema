<div class="form-row">

    <div class="form-group col-md-10">
        <select id="informe_id" name="informe_id" class="form-control">
            <option value="{{ $id}}">{{$resul}}</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Descripcion</label>
    <input type="text" class="form-control" name="descripcion" value="{{ isset($trabajo->descripcion)? $trabajo->descripcion:old('descripcion') }}" id="descripcion" required>
</div>

<div class="form-group">
    <label for="Foto">Imagen de trabajo realizado</label>

    @if(isset($trabajo->imagen))
    <img align=center class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$trabajo->imagen }}" width="500">
    @endif
    <input type="file" class="form-control" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="imagen" accept="image/*">
    
    <!--<input type="file" name="imagen" id="imagen" accept="image/*" class="form-control">
    </br>-->
</div>



<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-outline-light">{{$modo}}</button>
</div>

