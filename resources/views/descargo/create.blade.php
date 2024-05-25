@extends('adminlte::page')
@section('title','Registro descargo')
@section('content')
<div class="container">
    <div class="card card-success">
        <div class="card-header">
            <table width=100%>
                <tr>
                    <td align="left" width=5%>
                        <h2><i class="fas fa-clipboard-list"></i></h2>
                    </td>
                    <td align="center">
                        <h2>NUEVO DESCARGO</h2>
                    </td>
                </tr>
            </table>
        </div>
        <form action="{{ url('/descargos') }}" method="post" entype="multipart/form-data">
            @csrf
            <div class="card-body">
                @include('descargo.form', ['modo'=>'Guardar','user'])
            </div>
        </form>
    </div>
</div>
@endsection