<div class="btn-group btn-group-sm">
    <a href="{{ url('/productos/'.$pro->id.'/edit') }}" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$pro->id}}">
        <i class="fas fa-pen"></i>
    </a>
</div>


<!-- Modal -->
<div class="modal fade" id="editModal{{$pro->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-info">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">ACTUALIZAR PRODUCTO</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/productos/'.$pro->id)}}" method="post" entype="multipart/form-data">
                    @csrf
                    {{method_field('PATCH')}}
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nombre del Producto</label>
                        <input type="text" class="form-control" name="nombre" value="{{$pro->nombre}}" id="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Precio del Producto</label>
                        <input type="number" class="form-control" name="precio" value="{{ $pro->precio}}" id="precio" required>
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