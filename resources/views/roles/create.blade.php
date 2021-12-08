@extends('adminlte::page')
@section('title','Registro Informes')
@section('content')
<div class="container">
    <form action="{{ url('/roles') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                @include('roles.form', ['modo'=>'Siguiente'])
            </div>
        </div>
    </form>
</div>
@endsection