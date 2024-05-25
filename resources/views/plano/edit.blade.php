<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tipoPlano > option[value="{{isset($plano->tipoPlano)? $plano->tipoPlano:old(' + tipoPlano + ')}}"]').attr('selected', 'selected');
    });
</script>

@extends('adminlte::page')
@section('title','Actualizar salida')
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
                        <h2>ACTUALIZAR REGISTRO</h2>
                    </td>
                </tr>
            </table>
        </div>
        <form action="{{  url('/planos/'.$plano->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            {{method_field('PATCH')}}
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">ID Informe</label>
                        <select id="informe_id" name="informe_id" class="form-control">
                            <option value="{{$plano->informe_id}}">{{$resul}}</option>
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
                    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$plano->planta }}" width="800">
                    @endif
                    <input type="file" name="planta" id="planta" accept="image/*" class="form-control" required>
                    </br>
                </div>

                <div class="modal-footer justify-content-between">
                    @csrf
                    <a href="{{ url('/planosAgencias/'.$plano->informe_id) }}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Atras</a>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Actualizar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection