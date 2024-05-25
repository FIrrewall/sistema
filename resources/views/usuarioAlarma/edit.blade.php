@extends('adminlte::page')
@section('title','Actualizar')
@section('content')

<div class="container">
    <div class="card card-info">
        <div class="card-header">
            <table width=100%>
                <tr>
                    <td align="left" width=5%>
                        <h2><i class="fas fa-th-list"></i></h2>
                    </td>
                    <td align="center">
                        <h2> ACTUALIZAR USUARIO DE {{$resul}}</h2>
                    </td>
                </tr>
            </table>
        </div>

        <form action="{{ url('/usuariosAlarma/'.$usuario->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            {{method_field('PATCH')}}
            <div class="card-body">


                <div class="form-row">

                    <div class="form-group col-md-6">
                        <select id="informe_id" name="informe_id" class="form-control">
                            <option value="{{ isset($usuario->informe_id)? $usuario->informe_id:old($id) }}">{{$resul}}</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Numero de Usuario</label>
                        <input type="number" class="form-control" name="numeroUsuario" value="{{ isset($usuario->numeroUsuario)? $usuario->numeroUsuario:old('numeroUsuario') }}" id="numeroUsuario" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Nombre</label>
                        <input type="text" class="form-control" name="nombreUsuario" value="{{ isset($usuario->nombreUsuario)? $usuario->nombreUsuario:old('nombreUsuario') }}" id="nombreUsuario" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <!--<label for="exampleFormControlInput1">Numero de Area</label>
    <input type="text" class="form-control" name="numeroArea" value="{{ isset($usuario->numeroArea)? $usuario->numeroArea:old('numeroArea') }}" id="numeroArea" required>-->
                        <label for="exampleFormControlInput1">Numero de Area</label>
                        <select id="numeroArea" name="numeroArea" class="form-control" onchange="select();">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="0">0</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Area</label>
                        <!--<input type="text" class="form-control" name="area" value="{{ isset($usuario->area)? $usuario->area:old('area') }}" id="area" required>-->
                        <select id="area" name="area" class="form-control" onchange="select1();">
                            <option value="Ambiente">Ambiente</option>
                            <option value="Boveda">Boveda</option>
                            <option value="Atm">Atm</option>
                            <option value="Microcredito">Microcredito</option>
                            <option value="Custodia">Custodia</option>
                            <option value="Archivo">Archivo</option>
                            <option value="Preboveda">Preboveda</option>
                            <option value="Boveda auxiliar">Boveda auxiliar</option>
                            <option value="Embose">Embose</option>
                            <option value="Todos">Todos</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    @csrf
                    <!--<button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>-->
                    <a href="{{ url('/alarmaUsuarios/'.$usuario->informe_id) }}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Atras</a>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Actualizar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#numeroArea > option[value="{{isset($usuario->numeroArea)? $usuario->numeroArea:old(' + numeroArea + ')}}"]').attr('selected', 'selected');
        $('#area > option[value="{{isset($usuario->area)? $usuario->area:old(' + area + ')}}"]').attr('selected', 'selected');
    });
</script>

@include('sweetalert::alert')

<script type="text/javascript">
    //var sel = document.getElementById( 'codigoProducto' );
    //var index = sel.selectedIndex;
    var selection = document.getElementById("numeroArea");
    var descripcion = document.getElementById("area");

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