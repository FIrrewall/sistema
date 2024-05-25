@extends('adminlte::page')
@section('title','Nuevo Rol')
@section('content')
<div class="container">
    <br />
    <div class="card card-success">
        <div class="card-header">
            <table width=100%>
                <tr>
                    <td align="left" width=5%>
                        <h2><i class="fas fa-user"></i></h2>
                    </td>
                    <td align="center">
                        <h2>FORMULARIO DE ROLES</h2>
                    </td>
                </tr>
            </table>
        </div>

        <form action="{{ url('/roles') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
                @include('roles.form', ['modo'=>'Siguiente'])
            </div>

        </form>
    </div>
</div>
@endsection