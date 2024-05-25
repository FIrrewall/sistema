<a href="{{ url('/compra/'.$comp->id.'/edit') }}" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$comp->id}}">
    <i class="fas fa-pen"></i>
</a>


<!-- Modal -->
<div class="modal fade" id="editModal{{$comp->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-info">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">ACTUALIZAR VENTA</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/compra/'.$comp->id)}}" method="post" entype="multipart/form-data">
                    @csrf
                    {{method_field('PATCH')}}
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Fecha</label>
                        <input type="date" class="form-control" name="fecha" value="{{ $comp->fecha}}" id="fecha" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Costo Total</label>
                        <input type="number" class="form-control" name="costototal" value="{{$comp->costototal}}" id="costototal" required>
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