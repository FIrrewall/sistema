@extends('adminlte::page')

@section('content')
<div class="container">

<form action="{{ url('/informes/'.$informe->id) }}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}

@include('informe.form',['modo'=>'Editar'])
</form>
</div>
@endsection