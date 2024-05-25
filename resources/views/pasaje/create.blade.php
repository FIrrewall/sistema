@extends('adminlte::page')
@section('title','Registro pasaje')
@section('content')
<div class="container">
    <div class="card card-success">
        <div class="card-header">
            <table width=100%>
                <tr>
                    <td align="left" width=5%>
                        <h2><i class="fas fa-bus-alt"></i></h2>
                    </td>
                    <td align="center">
                        <h2>NUEVO REGISTRO</h2>
                    </td>
                </tr>
            </table>
        </div>
        <form action="{{ url('/pasajes') }}" method="post" entype="multipart/form-data">
            @csrf
            <div class="card-body">
                @include('pasaje.form', ['modo'=>'Guardar'])
            </div>
        </form>
    </div>
</div>
@endsection