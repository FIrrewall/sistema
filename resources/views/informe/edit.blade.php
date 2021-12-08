@extends('adminlte::page')

@section('content')
<div class="container">

    <form action="{{ url('/informes/'.$informe->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PATCH')}}
        <div class="card">
            <div class="card-body">
                @include('informe.form',['modo'=>'Actualizar'])
            </div>
        </div>
    </form>
</div>
@endsection