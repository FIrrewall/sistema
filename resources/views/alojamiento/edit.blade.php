<a href="{{ url('/alojamiento/'.$alo->id.'/edit') }}" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$alo->id}}">
    <i class="fas fa-pen"></i>
</a>

<!-- Modal -->
<div class="modal fade" id="editModal{{$alo->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-info">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">ACTUALIZAR ALOJAMIENTO</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/alojamiento/'.$alo->id)}}" method="post" entype="multipart/form-data">
                    @csrf
                    {{method_field('PATCH')}}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlInput1">Nombre del Alojamiento</label>
                            <input type="text" class="form-control" name="nombreA" value="{{$alo->nombreA}}" id="nombre" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlInput1">Numero de Habitaciones</label>
                            <input type="number" class="form-control" name="canthabitacion" value="{{ $alo->canthabitacion}}" id="canthabitacion" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Direccion</label>
                        <input type="text" class="form-control" name="direccion" value="{{$alo->direccion}}" id="direccion" required>
                    </div>

                    <div class="modal-footer justify-content-between">
                        @csrf
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-outline-light">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>