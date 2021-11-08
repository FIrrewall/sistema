@extends('adminlte::page')

@section('content')
<div class="container">
<form action="{{ url('/empleado') }}" method="post" entype="multipart/form-data">
@csrf
@include('empleado.form', ['modo'=>'Crear'])
</form>
</div>
@endsection

