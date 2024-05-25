<a href="{{ url('/productoinventario/'.$inve->id.'/edit') }}" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$inve->id}}">
    <i class="fas fa-pen"></i>
</a>


<div class="modal fade" id="editModal{{$inve->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-info">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">ACTUALIZAR PRODUCTO</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ url('/productoinventario/'.$inve->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{method_field('PATCH')}}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlInput1">Producto</label>
                            <select id="producto_id" name="producto_id" class="form-control">
                                @foreach($producto as $pro)
                                @if($pro->id == $inve->producto_id)
                                <option value="{{$pro->id}}">{{$pro->nombre}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlInput1">Cantidad</label>
                            <input type="number" class="form-control" name="cantidad0" value="" id="cantidad0" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="hidden" class="form-control" name="id" value="{{$inve->id}}" id="id" required>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="hidden" class="form-control" name="variable" value="0" id="variable" required>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="hidden" class="form-control" name="idIn" value="{{$idIn}}" id="idIn" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="hidden" class="form-control" name="cantidad" value="{{$inve->cantidad}}" id="cantidad" required>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="hidden" class="form-control" name="entrada" value="{{$inve->entrada}}" id="entrada" required>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="hidden" class="form-control" name="salida" value="{{$inve->salida}}" id="salida" required>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-outline-light">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>