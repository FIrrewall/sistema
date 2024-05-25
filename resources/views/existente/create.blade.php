@extends('adminlte::page')
@section('title','Registro existente')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="container">
    <div class="card card-success">
        <div class="card-header">
            <table width=100%>
                <tr>
                    <td align="left" width=5%>
                        <h2><i class="fas fa-clipboard-list"></i></h2>
                    </td>
                    <td align="center">
                        <h2>NUEVO RESUMEN</h2>
                    </td>
                </tr>
            </table>
        </div>
        <form action="{{ url('/existentes') }}" method="post" entype="multipart/form-data">
            @csrf
            <div class="card-body">
                @include('existente.form', ['modo'=>'Guardar','$resul','$exis'])
            </div>
        </form>
    </div>
</div>
@endsection