@extends('adminlte::page')
@section('title','Actualizar registro')
@section('content')

<div class="container">
    <div class="card card-info">
        <div class="card-header">
            <table width=100%>
                <tr>
                    <td align="left" width=5%>
                        <h2><i class="fas fa-money-bill-alt"></i></h2>
                    </td>
                    <td align="center">
                        <h2>ACTUALIZAR VIATICO</h2>
                    </td>
                </tr>
            </table>
        </div>
        <form action="{{ url('/viaticos/'.$viatico->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            {{method_field('PATCH')}}
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="exampleFormControlInput1">ID Descargo</label>
                        <select id="descargo_id" name="descargo_id" class="form-control">
                            <option value="{{$viatico->descargo_id}}">{{$viatico->descargo_id}}</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="exampleFormControlInput1">Codigo</label>
                        <select id="codigo" name="codigo" class="form-control">
                            <option value="{{$viatico->codigo}}">{{$viatico->codigo}}</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">Detalle</label>
                        <input type="text" class="form-control" name="detalle" value="{{ isset($viatico->detalle)? $viatico->detalle:old('detalle') }}" id="detalle" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">Fecha</label>
                        <input type="date" class="form-control" name="fecha" value="{{ isset($viatico->fecha)? \Carbon\Carbon::parse($viatico->fecha)->format('Y-m-d'):old('fecha') }}" id="fecha" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <label for="exampleFormControlInput1">Costo de Alojamiento</label>
                        <div class="input-group mb-2">
                            <input type="number" step="0.01" class="form-control" id="inlineFormInputGroup" name="alojamiento" value="{{ isset($viatico->alojamiento)? $viatico->alojamiento:old('alojamiento') }}" required>
                            <div class="input-group-prepend">
                                <div class="input-group-text">Bs.</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="exampleFormControlInput1">Costo de Desayuno</label>
                        <div class="input-group mb-2">
                            <input type="number" step="0.01" class="form-control" id="inlineFormInputGroup" name="desayuno" value="{{ isset($viatico->desayuno)? $viatico->desayuno:old('desayuno') }}" required>
                            <div class="input-group-prepend">
                                <div class="input-group-text">Bs.</div>
                            </div>
                        </div>
                    </div>
                </div>

                <br />

                <div class="form-row">
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1">Costo de Almuerzo</label>
                        <div class="input-group mb-2">
                            <input type="number" step="0.01" class="form-control" id="inlineFormInputGroup" name="almuerzo" value="{{ isset($viatico->almuerzo)? $viatico->almuerzo:old('almuerzo') }}" required>
                            <div class="input-group-prepend">
                                <div class="input-group-text">Bs.</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="exampleFormControlInput1">Costo de Cena</label>
                        <div class="input-group mb-2">
                            <input type="number" step="0.01" class="form-control" id="inlineFormInputGroup" name="cena" value="{{ isset($viatico->cena)? $viatico->cena:old('cena') }}" required>
                            <div class="input-group-prepend">
                                <div class="input-group-text">Bs.</div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="exampleFormControlInput1">Gastos Varios</label>
                        <div class="input-group mb-2">
                            <input type="number" step="0.01" class="form-control" id="inlineFormInputGroup" name="gastosVarios" value="{{ isset($viatico->gastosVarios)? $viatico->gastosVarios:old('gastosVarios') }}" required>
                            <div class="input-group-prepend">
                                <div class="input-group-text">Bs.</div>
                            </div>

                        </div>
                    </div>
                </div>
                <br />


                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="exampleFormControlInput1">Detalle de Gastos de Transporte</label>
                        <input type="text" class="form-control" name="detalleGastosVarios" value="{{ isset($viatico->detalleGastosVarios)? $viatico->detalleGastosVarios:old('detalleGastosVarios') }}" id="detalleGastosVarios" required>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1">Costo de Transporte</label>
                        <div class="input-group mb-2">
                            <input type="number" step="0.01" class="form-control" id="inlineFormInputGroup" name="transporte" value="{{ isset($viatico->transporte)? $viatico->transporte:old('transporte') }}" required>
                            <div class="input-group-prepend">
                                <div class="input-group-text">Bs.</div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <a href="{{ url('/registroViaticos/'.$viatico->descargo_id) }}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Atras</a>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Actualizar</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection