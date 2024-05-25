<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#departamento > option[value="{{isset($descargo->departamento)? $descargo->departamento:old(' + departamento + ')}}"]').attr('selected', 'selected');
        $('#departamento > option[value="{{isset($descargo->cargo)? $descargo->cargo:old(' + cargo + ')}}"]').attr('selected', 'selected');
    });
</script>


@extends('adminlte::page')
@section('title','Actualizar descargo')
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
                        <h2>ACTUALIZAR DESCARGO</h2>
                    </td>
                </tr>
            </table>
        </div>
        <form action="{{  url('/descargos/'.$descargo->id)}}" method="post" entype="multipart/form-data">
            @csrf
            {{method_field('PATCH')}}
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="departamento">Departamento</label>
                        <select class="form-control" name="departamento" id="departamento">
                            <option value="La Paz">La Paz</option>
                            <option value="Oruro">Oruro</option>
                            <option value="Potosi">Potosi</option>
                            <option value="Cochabamba">Cochabamba</option>
                            <option value="Tarija">Tarija</option>
                            <option value="Sucre">Sucre</option>
                            <option value="Santa Cruz">Santa Cruz</option>
                            <option value="Beni">Beni</option>
                            <option value="Pando">Pando</option>
                        </select>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="exampleFormControlInput1">Nombre de Solicitante</label>
                        <!--<input type="text" class="form-control" name="nombreSolicitante" value="{{ isset($descargo->nombreSolicitante)? $descargo->nombreSolicitante:old('nombreSolicitante') }}" id="nombreSolicitante">-->
                        <select class="form-control" name="nombreSolicitante" id="nombreSolicitante">
                            <option value="{{$user}}">{{$user}}</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">Cargo</label>
                        <!--<input type="text" class="form-control" name="cargo" value="{{ isset($descargo->cargo)? $descargo->cargo:old('cargo') }}" id="cargo">-->
                        <select class="form-control" name="cargo" id="cargo">
                            <option value="TECNICO">TECNICO</option>
                            <option value="ADMINISTRACION">ADMINISTRACION</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">Nombre de Destinatario</label>
                        <input type="text" class="form-control" name="nombreDestinatario" value="{{ isset($descargo->nombreDestinatario)? $descargo->nombreDestinatario:old('nombreDestinatario') }}" id="nombreDestinatario">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="fecha">Fecha</label>
                        <input type="date" class="form-control" name="fecha" value="{{ isset($descargo->fecha)? \Carbon\Carbon::parse($descargo->fecha)->format('Y-m-d'):old('fecha') }}" id="fecha">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="fecha">Fecha Desde</label>
                        <input type="date" class="form-control" name="fechaDesde" value="{{ isset($descargo->fechaDesde)? \Carbon\Carbon::parse($descargo->fechaDesde)->format('Y-m-d'):old('fechaDesde') }}" id="fechaDesde">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="fecha">Fecha Hasta</label>
                        <input type="date" class="form-control" name="fechaHasta" value="{{ isset($descargo->fechaHasta)? \Carbon\Carbon::parse($descargo->fechaHasta)->format('Y-m-d'):old('fechaHasta') }}" id="fechaHasta">
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <a href="{{ url('/descargos') }}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Atras</a>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Actualizar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection