</br>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nº de Serie</th>
                <th scope="col">Marca</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Capacidad en TB</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table>
</div>


@if($informes -> id == $hdd->informe_id)
@endif
['modo'=>'Crear']



<!--<div class="table-responsive">
            </br>
            <table class="table table-striped" id="datosCctv">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre del equipo</th>
                        <th>Cantidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inCctvs as $inCctv)
                    @if($informes -> id == $inCctv->informe_id)
                    <tr>
                        <td>{{ $inCctv->id}}</td>
                        <td>{{ $inCctv->nombreEquipo}}</td>
                        <td>{{ $inCctv->catidad}}</td>
                        <td>
                            @include('hdd.edit', compact($inCctv -> id))
                            <form action="{{ url('/hdds/'.$hdd->id) }}" class="d-inline" method="post">
                                @csrf
                                {{method_field('DELETE')}}
                                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>-->



        <!--<div class="table-responsive">
            </br>
            <table class="table table-striped" id="datosHdd">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nº de Serie</th>
                        <th>Marca</th>
                        <th>Cantidad</th>
                        <th>Capacidad en TB</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hdds as $hdd)
                    @if($informes -> id == $hdd->informe_id)
                    <tr>
                        <td>{{ $hdd->id}}</td>
                        <td>{{ $hdd->numeroSerie}}</td>
                        <td>{{ $hdd->marca}}</td>
                        <td>{{ $hdd->cantidad}}</td>
                        <td>{{ $hdd->capacidad}}</td>
                        <td>
                            @include('hdd.edit', compact($hdd -> id))
                            <form action="{{ url('/hdds/'.$hdd->id) }}" class="d-inline" method="post">
                                @csrf
                                {{method_field('DELETE')}}
                                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        </br>
        </br>-->
        <!--
        <div class="table-responsive">
            </br>
            <table class="table table-striped" id="datosCctv">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre del equipo</th>
                        <th>Cantidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inCctvs as $inCctv)
                    @if($informes -> id == $inCctv->informe_id)
                    <tr>
                        <td>{{ $inCctv->id}}</td>
                        <td>{{ $inCctv->nombreEquipo}}</td>
                        <td>{{ $inCctv->catidad}}</td>
                        <td>
                            @include('inCctv.edit', compact($inCctv -> id))
                            <form action="{{ url('/inventarioCctvs/'.$inCctv -> id) }}" class="d-inline" method="post">
                                @csrf
                                {{method_field('DELETE')}}
                                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        -->


        <!--
        <a href="{{ url('/hdds/'.$hdd->id.'/edit') }}" class="btn btn-warning" ">
            Inventario de CCTV
        </a>
        <a href="{{ url('/hdds/'.$hdd->id.'/edit') }}" class="btn btn-warning" ">
            Inventario de Alarmas
        </a>
        <a href="{{ url('/hdds/'.$hdd->id.'/edit') }}" class="btn btn-warning" ">
            Zonificacion
        </a>
        <a href="{{ url('/hdds/'.$hdd->id.'/edit') }}" class="btn btn-warning" ">
            Usuarios
        </a>
        <a href="{{ url('/hdds/'.$hdd->id.'/edit') }}" class="btn btn-warning" ">
            Numeros registrados
        </a>
        <a href="{{ url('/hdds/'.$hdd->id.'/edit') }}" class="btn btn-warning" ">
            Trabajos Realizados
        </a>
        <a href="{{ url('/hdds/'.$hdd->id.'/edit') }}" class="btn btn-warning" ">
            Planos
        </a>-->