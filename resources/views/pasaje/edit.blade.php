@extends('adminlte::page')
@section('title','Actualizar salida')
@section('content')
<div class="container">
    <div class="card card-info">
        <div class="card-header">
            <table width=100%>
                <tr>
                    <td align="left" width=5%>
                        <h2><i class="fas fa-bus-alt"></i></h2>
                    </td>
                    <td align="center">
                        <h2>ACTUALIZAR REGISTRO</h2>
                    </td>
                </tr>
            </table>
        </div>
        <form action="{{  url('/pasajes/'.$pasaje->id)}}" method="post" entype="multipart/form-data">
            @csrf
            {{method_field('PATCH')}}
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="exampleFormControlInput1">ID Descargo</label>
                        <select id="descargo_id" name="descargo_id" class="form-control">
                            <option value="{{$pasaje->descargo_id}}">{{$pasaje->descargo_id}}</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="exampleFormControlInput1">Codigo</label>
                        <select id="codigo" name="codigo" class="form-control">
                            <option value="{{$pasaje->codigo}}">{{$pasaje->codigo}}</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Detalle</label>
                        <input type="text" class="form-control" name="detalle" value="{{ isset($pasaje->detalle)? $pasaje->detalle:old('detalle') }}" id="detalle" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="exampleFormControlInput1">Fecha</label>
                        <input type="date" class="form-control" name="fecha" value="{{ isset($pasaje->fecha)? \Carbon\Carbon::parse($pasaje->fecha)->format('Y-m-d'):old('fecha') }}" id="fecha" required>
                    </div>
                </div>
                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">Transporte</label>
                        <input type="text" class="form-control" name="transporte" value="{{ isset($pasaje->transporte)? $pasaje->transporte:old('transporte') }}" id="transporte" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">Origen</label>
                        <input type="text" class="form-control" name="origen" value="{{ isset($pasaje->origen)? $pasaje->origen:old('origen') }}" id="origen" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">Destino</label>
                        <input type="text" class="form-control" name="destino" value="{{ isset($pasaje->destino)? $pasaje->destino:old('destino') }}" id="destino" required>
                    </div>
                </div>
                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">cliente</label>
                        <input type="text" class="form-control" name="cliente" value="{{ isset($pasaje->cliente)? $pasaje->cliente:old('cliente') }}" id="cliente" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">proyecto</label>
                        <input type="text" class="form-control" name="proyecto" value="{{ isset($pasaje->proyecto)? $pasaje->proyecto:old('proyecto') }}" id="proyecto" required>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1">Monto</label>
                        <div class="input-group mb-2">
                            <input type="number" step="0.01" class="form-control" id="inlineFormInputGroup" name="monto" value="{{ isset($pasaje->monto)? $pasaje->monto:old('monto') }}" required>
                            <div class="input-group-prepend">
                                <div class="input-group-text">Bs.</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    @csrf
                    <a href="{{ url('/registroPasajes/'.$pasaje->descargo_id) }}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Atras</a>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Actualizar</button>

                </div>
            </div>
        </form>
    </div>
</div>
@endsection