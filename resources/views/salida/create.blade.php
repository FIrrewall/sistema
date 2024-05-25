@extends('adminlte::page')
@section('title','Registro salida')
@section('content')
<div class="container">
    <div class="card card-success">
        <div class="card-header">
            <h2>
                <center><i class="fas fa-sign-out-alt"></i> NUEVA SALIDA</center>
            </h2>
        </div>
        <form action="{{ url('/salidas') }}" method="post" entype="multipart/form-data">
            @csrf
            <div class="card-body">
                @include('salida.form', ['modo'=>'Guardar','$resul'])
            </div>
        </form>
    </div>
</div>
@endsection