<div class="form-row">
    <div class="form-group col-md-2">
        <label for="exampleFormControlInput1">ID Inventario</label>
        <select id="invantari_id" name="inventari_id" class="form-control">
            <option value="{{$id}}">{{$resul}}</option>
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="exampleFormControlInput1">Nombre del Proyecto</label>
        <input type="text" class="form-control" name="nombreProyecto" value="{{ isset($salida->nombreProyecto)? $salida->nombreProyecto:old('nombreProyecto') }}" id="nombreProyecto" required>
    </div>
    <div class="form-group col-md-4">
        <label for="exampleFormControlInput1">Numero de Nota</label>
        <input type="number" class="form-control" name="numeroNotaSal" value="{{ isset($salida->numeroNotaSal)? $salida->numeroNotaSal:old('numeroNotaSal') }}" id="numeroNotaSal" required>
    </div>
</div>

<div class="form-row">

    <div class="form-group col-md-4">
        <label for="exampleFormControlInput1">Fecha</label>
        <input type="date" class="form-control" name="fecha" value="{{ isset($salida->fecha)? \Carbon\Carbon::parse($salida->fecha)->format('Y-m-d'):old('fecha') }}" id="fecha" required>
    </div>
    <div class="form-group col-md-2">
        <label for="exampleFormControlInput1">Codigo</label>
        <select id="codigoSal" name="codigoSal" class="form-control" onchange="select();">
            @foreach($productos as $producto)
            <option value="{{$producto->codigoProducto}}">{{$producto->codigoProducto}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="exampleFormControlInput1">Descripcion</label>
        <select id="descripcionSal" name="descripcionSal" class="form-control" onchange="select1();">
            @foreach($productos as $producto)
            <option value="{{$producto->descripcion}}">{{$producto->descripcion}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group col-md-4">
    <label for="exampleFormControlInput1">Cantidad</label>
    <input type="number" class="form-control" name="cantidadSal" value="{{ isset($salida->cantidadSal)? $salida->cantidadSal:old('cantidadSal') }}" id="cantidadSal" required>
</div>
<div class="modal-footer justify-content-between">
    @csrf
    <a href="{{ url('/salidaInventario/'.$id) }}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Atras</a>
    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> {{$modo}}</button>
</div>

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@include('sweetalert::alert')

<script type="text/javascript">
    //var sel = document.getElementById( 'codigoProducto' );
    //var index = sel.selectedIndex;

    var selection = document.getElementById("codigoSal");
    var descripcion = document.getElementById("descripcionSal");

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