<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->

<div class="form-row">
    <div class="form-group col-md-2">
        <select id="inventari_id" name="inventari_id" class="form-control">
            <option value="{{$id}}">{{$resul}}</option>
        </select>
    </div>
</div>


<div class="form-row">

    <div class="form-group col-md-2">
        <label for="exampleFormControlInput1">Codigo</label>
        <select id="codigoProducto" name="codigoProducto" class="form-control" onchange="select();">
            @foreach($productos as $producto)
            <option value="{{$producto->codigoProducto}}">{{$producto->codigoProducto}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-10">
        <label for="exampleFormControlInput1">Descripcion</label>
        <select id="descripcionEx" name="descripcionEx" class="form-control" onchange="select1();">
            @foreach($productos as $producto)
            <option value="{{$producto->descripcion}}">{{$producto->descripcion}}</option>
            @endforeach
        </select>

    </div>
</div>

<div class="form-group">
    <label for="exampleFormControlInput1">Cantidad</label>
    <input type="number" class="form-control" name="existenciaInicial" value="{{ isset($existente->existenciaInicial)? $existente->existenciaInicial:old('existenciaInicial') }}" id="existenciaInicial" required>
</div>

<div class="modal-footer justify-content-between">
    @csrf
    <a href="{{ url('/existenteInventario/'.$id) }}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Atras</a>
    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
</div>


@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@include('sweetalert::alert')

<script type="text/javascript">
    //var sel = document.getElementById( 'codigoProducto' );
    //var index = sel.selectedIndex;
    var selection = document.getElementById("codigoProducto");
    var descripcion = document.getElementById("descripcionEx");

    function select() {
        for (var i = 0; i < descripcion.length; i++) {
            if (selection.selectedIndex == descripcion[i].index) {
                descripcion.options[i].selected = true;
                //console.log(descripcion[i].text);
            }
        }
    }

    function select1() {
        for (var i = 0; i < selection.length; i++) {
            if (descripcion.selectedIndex == selection[i].index) {
                selection.options[i].selected = true;
                //console.log(selection[i].text);
            }
        }
    }
</script>

@endsection