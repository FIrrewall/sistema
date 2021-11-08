@extends('adminlte::page')

@section('content')
<div class="container">
<form action="{{ url('/informes') }}" method="post" entype="multipart/form-data">

@csrf

@include('informe.form', ['modo'=>'Crear'])
</form>
</div>
@endsection