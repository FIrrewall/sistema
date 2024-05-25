@extends('adminlte::page')
@section('title','Nuevo usuario')
@section('content')
<div class="container">
    <div class="card card-success">
        <div class="card-header">
            <table width=100%>
                <tr>
                    <td align="left" width=5%>
                        <h2><i class="fas fa-user"></i></h2>
                    </td>
                    <td align="center">
                        <h2>NUEVO USUARIO</h2>
                    </td>
                </tr>
            </table>
        </div>
        <form action="{{ url('/users') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    @include('users.form', ['modo'=>'Siguiente'])
                </div>
            </div>
        </form>
    </div>
</div>
@endsection