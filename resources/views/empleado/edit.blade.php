@extends('adminlte::page')

@section('content')
<div class="container">

    <form action="{{ url('/empleado/'.$empleado->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PATCH')}}

        @include('empleado.form',['modo'=>'Editar'])
    </form>
</div>
@endsection

<div class="form-row">
    <div class="form-group col-md-4">
        <label for="inputEmail4">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ isset($reserva->nombre)? $reserva->nombre:old('nombre') }}">
    </div>
    <div class="form-group col-md-4">
        <label for="inputPassword4">Apellido Paterno</label>
        <input type="text" class="form-control" id="paterno" name="paterno" value="{{ isset($reserva->paterno)? $reserva->paterno:old('paterno') }}">
    </div>
    <div class="form-group col-md-4">
        <label for="inputEmail4">Apellido Materno</label>
        <input type="text" class="form-control" id="materno" name="materno" value="{{ isset($reserva->materno)? $reserva->materno:old('materno') }}">
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
        <label for="inputEmail4">CI</label>
        <input type="text" class="form-control" id="ci" name="ci" value="{{ isset($reserva->ci)? $reserva->ci:old('ci') }}">
    </div>
    <div class="form-group col-md-4">
        <label for="inputPassword4">Edad</label>
        <input type="number" class="form-control" id="edad" name="edad" value="{{ isset($reserva->edad)? $reserva->edad:old('edad') }}">
    </div>
    <div class="form-group col-md-4">
        <label for="inputState">Estado</label>
        <select id="estado" name="" class="form-control">
            <option value="acompañado" selected>Acompañante</option>
            <option value="solo">Solo</option>
        </select>
    </div>
</div>


<div class="form-row">
    <div class="form-group col-md-4">
        <label for="inputEmail4">Nombres</label>
        <input type="text" class="form-control" id="nombreacompañante" name="nombreacompañante" value="{{ isset($reserva->nombreacompañante)? $reserva->nombreacompañante:old('nombreacompañante') }}">
    </div>
    <div class="form-group col-md-4">
        <label for="inputPassword4">Apellido Paterno</label>
        <input type="text" class="form-control" id="paternoacompañante" name="paternoacompañante" value="{{ isset($reserva->paternoacompañante)? $reserva->paternoacompañante:old('paternoacompañante') }}">
    </div>
    <div class="form-group col-md-4">
        <label for="inputEmail4">Apellido Materno</label>
        <input type="text" class="form-control" id="maternoacompañante" name="maternoacompañante" value="{{ isset($reserva->maternoacompañante)? $reserva->maternoacompañante:old('maternoacompañante') }}">
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
        <label for="inputPassword4">Edad</label>
        <input type="number" class="form-control" id="edadacompañante" name="edadacompañante" value="{{ isset($reserva->edadacompañante)? $reserva->edadacompañante:old('edadacompañante') }}">
    </div>
    <div class="form-group col-md-4">
        <label for="inputEmail4">CI</label>
        <input type="text" class="form-control" id="ciacompañante" name="ciacompañante" value="{{ isset($reserva->ciacompañante)? $reserva->ciacompañante:old('ciacompañante') }}">
    </div>
    <div class="form-group col-md-4">
        <label for="inputState">Habitacion</label>
        <select id="habitacion_id" name="habitacion_id" class="form-control">
            @foreach($habita as $hab)
            <option value="{{$hab->id}}" selected>{{$hab->numhabitacion}} {{$hab->preferencias}}</option>
            @endforeach
        </select>
    </div>
</div>