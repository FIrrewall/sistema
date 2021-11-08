@extends('adminlte::page')

@section('content')
<div class="container">
<form action="{{ url('/inventario') }}" method="post" entype="multipart/form-data">

@csrf

@include('inventario.form', ['modo'=>'Crear'])
</form>
</div>
@endsection







