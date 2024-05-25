<a href="{{ url('/productoinventario/'.$inve->id) }}" class="btn btn-danger" data-toggle="modal" data-target="#editModal1{{$inve->id}}">
    <i class="fas fa-share"></i>
</a>

<!-- Modal -->
<div class="modal fade" id="editModal1{{$inve->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-orange">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">AUMENTAR HORAS EXTRAS</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/productoinventario/'.$inve->id) }}" method="post" entype="multipart/form-data">
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
                            <label for="exampleFormControlInput1">Salida</label>
                            <input type="number" class="form-control" name="salida2" value="" id="salida2" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="hidden" class="form-control" name="id" value="{{$inve->id}}" id="id" required>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="hidden" class="form-control" name="variable" value="2" id="variable" required>
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
                        @csrf
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-outline-light">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>