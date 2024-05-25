@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <div class="card-secondary mb-3" style="max-width: 25rem;" >
            <div class="card-header">
                <table width=100%>
                    <tr>
                        <td align="left" width=5%>
                            <h2><i class="fas fa-clipboard"></i></h2>
                        </td>
                        <td align="center">
                            <h2> EDITAR NOTA</h2>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="car-body">
            {!! Form::model($despacho,['route'=> ['admin.despacho.update', $despacho], 'method'=>'put']) !!}
            <div class="container" style="margin-bottom: 100px;">
                <div class="form-row">       
                    <div class="col-md-5 mb-3">
                        {!! Form::label('codigo', 'Codigo')!!}
                        {!! Form::text('codigo', null, ['class'=> 'form-control', 'placeholder'=>'Codigo', 'required']) !!}
                    </div>
            
                    <div class="col-md-5 mb-3">
                        {!! Form::label('distribuior_id', 'Distribuidor')!!}
                        {!! Form::select('distribuidor_id', $distribuidores, null, ['class'=>'form-control selectpicker','data-live-search'=>'true']) !!}
                    </div>

                    <div class="col-md-2 mb-3">
                        {!! Form::text('user_id', Auth::user()->id, ['class'=> 'form-control', 'required', 'hidden']) !!}
                    </div>
                </div>
            
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        {!! Form::label('fecha', 'Fecha')!!}
                        {!! Form::date('fecha', null, ['class'=> 'form-control', 'placeholder'=>'fecha', 'required']) !!}    
                    </div>
            
                    <div class="col-md-3 mb-3">
                        {!! Form::label('entardacanasta', 'Entrada de Canastillos')!!}
                        {!! Form::number('entradacanasta', null, ['class'=> 'form-control', 'placeholder'=>'Entrada Canastillos']) !!}
                    </div>
            
                    <div class="col-md-3 mb-3">
                        {!! Form::label('salidacanasta', 'Salida de Canastillos')!!}
                        {!! Form::number('salidacanasta', null, ['class'=> 'form-control', 'placeholder'=>'Salida Canastillos']) !!}
                    </div> 
            </div>
            {!! Form::submit('Actualizar Nota', ['class'=> 'btn btn-primary', 'id'=>'editar']) !!}  
            {!! Form::close() !!}
            <br>
            <br>

        @include('admin.despachoproducto.create', [$despacho])
        <br>
        <table id="usuarios" class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Despacho</th>
                <th>Producto</th>
                <th>Fecha Vencimiento</th>
                <th>Salidas</th>
                <th>devoluciones</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($despachoproducto as $despachoproducto)
                @if ($despachoproducto->despacho_id == $despacho->id)
                    <tr>
                        <td>{{$despachoproducto->id}}</td>
                        <td>{{$despacho->codigo}}</td>
                        @foreach ($producto as $productoq) 
                        @if ($despachoproducto->producto_id == $productoq->id)
                        <td>{{$productoq->nombre}}</td>
                        @endif 
                        @endforeach 
                        <td>{{$despachoproducto->fvencimiento}}</td>
                        <td>{{$despachoproducto->salida}}</td>
                        <td>{{$despachoproducto->devoluciones}}</td>
                        <td width="100px">
                            @csrf
                            @include('admin.despachoproducto.edit')
                        </td>
                        <td width="100px">
                             <form action="{{route('admin.despachoproducto.destroy', $despachoproducto)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>   
                        </td>
                    </tr>
                   @endif 
                @endforeach
            </tbody>
        </table>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function(){
        $('#editar').click(function(){
            alert();
        });
    });
    function alert(){
        Swal.fire({
                icon: 'success',
                title: 'CATEGORIA ACTUALIZADA',
                showConfirmButton: false,
                timer: 3500
            })
    }
</script>

<script>
    $(document).ready(function(){
        $('#agregar').click(function(){
            agregar();
        });
    });
    var cont=0;
    
    function agregar(){
        producto_id=$("#producto_id option:selected").val();
        producto_nombre=$("#producto_id option:selected").text();
        salida=$("#salida").val();
        fvencimiento=$("#fvencimiento").val();
        devoluciones=$("#devoluciones").val();

        if(salida!=""){
            var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input name="producto_id[]" value="'+producto_id+'">'+producto_nombre+'</td><td><input type="number" name="salida[]" value="'+salida+'"></td><td><input type="date" name="fvencimiento[]" value="'+fvencimiento+'"></td><td><input type="number" name="devoluciones[]" value="'+devoluciones+'"></td></tr>';
            cont++;
            limpiar();
            $('#detalles').append(fila);
        }
    }

    function limpiar(){
        $("#producto_id").val("");
        $("#salida").val("salida").val("");
        $("#fvencimiento").val("fvencimiento").val("");
        $("#devoluciones").val("devoluciones").val("");
    }
</script>
@stop