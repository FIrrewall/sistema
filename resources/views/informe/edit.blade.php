@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="card card-info">
        <div class="card-header">
            <table width=100%>
                <tr>
                    <td align="left" width=5%>
                        <h2><i class="fas fa-clipboard"></i></h2>
                    </td>
                    <td align="center">
                        <h2> ACTUALIZAR INFORME</h2>
                    </td>
                </tr>
            </table>
        </div>
        <form action="{{ url('/informes/'.$informe->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{method_field('PATCH')}}
            <div class="card-body">
                @include('informe.form',['modo'=>'Actualizar','user'])
            </div>
        </form>
    </div>
</div>
@endsection