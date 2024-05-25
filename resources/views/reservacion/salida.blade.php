<a href="{{ url('/reservacion/'.$reser->id) }}" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{$reser->id}}">
    <i class="fas fa-clock"></i>
</a>

<!-- Modal -->
<div class="modal fade" id="editModal{{$reser->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-olive">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">AUMENTAR HORAS EXTRAS</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/reservacion/'.$reser->id) }}" method="post" entype="multipart/form-data">
                    @csrf
                    {{method_field('PATCH')}}
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputState">Aumentar tiempo</label>
                            <select id="aumentartiempo" name="aumentartiempo" class="form-control">
                                <option value="HORA" selected>1 HORA</option>
                            </select>
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