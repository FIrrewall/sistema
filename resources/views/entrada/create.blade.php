@extends('adminlte::page')
@section('title','Registro entrada')
@section('content')
<div class="container">
    <div class="card card-success">
        <div class="card-header">
            <table width=100%>
                <tr>
                    <td align="left" width=5%>
                        <h2><i class="fas fa-ticket-alt"></i></h2>
                    </td>
                    <td align="center">
                        <h2>NUEVA ENTRADA</h2>
                    </td>
                </tr>
            </table>
        </div>
        <form action="{{ url('/entradas') }}" method="post" entype="multipart/form-data">
            @csrf
            <div class="card-body">
                @include('entrada.form', ['modo'=>'Guardar','$resul'])
            </div>
        </form>
    </div>
</div>
@endsection