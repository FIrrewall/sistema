@extends('adminlte::page')
@section('title','Nuevo usuario')
@section('content')
<div class="container">
    <form action="{{ url('/users') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                @include('users.form', ['modo'=>'Siguiente'])
            </div>
        </div>
    </form>
</div>
@endsection