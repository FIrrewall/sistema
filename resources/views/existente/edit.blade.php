@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#codigoProducto > option[value="{{isset($existente->codigoProducto)? $existente->codigoProducto:old(' + codigoProducto + ')}}"]').attr('selected', 'selected');
        $('#descripcion > option[value="{{isset($existente->descripcionEx)? $existente->descripcionEx:' + descripcion + ' }}"]').attr('selected', 'selected');
    });
</script>

<script type="text/javascript">
    //var sel = document.getElementById( 'codigoProducto' );
    //var index = sel.selectedIndex;

    var selection = document.getElementById("codigoProducto");
    var descripcion = document.getElementById("descripcion");

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



@extends('adminlte::page')
@section('title','Registro Informes')
@section('content')
<div class="container">
    <div class="card card-info">
        <div class="card-header">
            <table width=100%>
                <tr>
                    <td align="left" width=5%>
                        <h2><i class="fas fa-clipboard-list"></i></h2>
                    </td>
                    <td align="center">
                        <h2>ACTUALIZAR RESUMEN</h2>
                    </td>
                </tr>
            </table>
        </div>
        <form action="{{ url('/existentes/'.$existente->id)}}" method="post" entype="multipart/form-data">
            @csrf
            {{method_field('PATCH')}}
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <select id="inventari_id" name="inventari_id" class="form-control">
                            <option value="{{ isset($existente->inventari_id)? $existente->inventari_id:old($id) }}">{{$resul}}</option>
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
                        <select id="descripcion" name="descripcionEx" class="form-control" onchange="select1();">
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
                    <a href="{{ url('/existenteInventario/'.$existente->inventari_id) }}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Atras</a>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Actualizar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection