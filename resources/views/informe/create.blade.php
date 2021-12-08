@extends('adminlte::page')
@section('title','Registro Informes')
@section('content')
<div class="container">
    <form action="{{ url('/informes') }}" method="post" entype="multipart/form-data">

        @csrf
        <div class="card">
            <div class="card-body">
                @include('informe.form', ['modo'=>'Guardar Datos'])
            </div>
        </div>
    </form>
</div>
@endsection