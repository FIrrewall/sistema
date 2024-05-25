@extends('adminlte::page')
@section('title','Registro Informes')

@section('content')
<div class="container">
    <div class="card card-success">
        <div class="card-header">
            <table width=100%>
                <tr>
                    <td align="left" width=5%>
                        <h2><i class="fas fa-clipboard"></i></h2>
                    </td>
                    <td align="center">
                        <h2> NUEVO INFORME</h2>
                    </td>
                </tr>
            </table>
        </div>
        <form action="{{ url('/informes') }}" method="post" entype="multipart/form-data">

            @csrf

            <div class="card-body">
                @include('informe.form', ['modo'=>'Guardar Datos','user'])
            </div>

        </form>
    </div>
</div>
@endsection