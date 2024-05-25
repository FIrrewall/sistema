<div class="btn-group btn-group-sm">
    <a href="{{ url('/habitacion/'.$hab->id.'/edit') }}" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$hab->id}}">
        <i class="fas fa-pen"></i>
    </a>
</div>


<!-- Modal -->
<div class="modal fade" id="editModal{{$hab->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-info">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">ACTUALIZAR HABITACIONES</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/habitaciones/'.$hab->id)}}" method="post" entype="multipart/form-data">
                    @csrf
                    {{method_field('PATCH')}}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlInput1">Numero de habitacion</label>
                            <input type="number" class="form-control" name="numhabitacion" value="{{$hab->numhabitacion}}" id="numhabitacion" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlInput1">Preferencia</label>
                            <select id="preferencias" name="preferencias" class="form-control">
                                @if($hab->preferencias == 'SIMPLE')
                                <option value="SIMPLE" selected>SIMPLE</option>
                                <option value="CON BAÑO PRIVADO">CON BAÑO PRIVADO</option>
                                @elseif($hab->preferencias == 'CON BAÑO PRIVADO')
                                <option value="CON BAÑO PRIVADO" selected>CON BAÑO PRIVADO</option>
                                <option value="SIMPLE">SIMPLE</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="hidden" class="form-control" name="alojamiento_id" value="{{$id}}" id="alojamiento_id" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlInput1">Estado</label>
                            <select id="estadoH" name="estadoH" class="form-control">
                                @if($hab->estadoH == 'LIBRE')
                                <option value="LIBRE" selected>LIBRE</option>
                                <option value="OCUPADO">OCUPADO</option>
                                <option value="SUCIO">SUCIO</option>
                                @elseif($hab->estadoH == 'OCUPADO')
                                <option value="LIBRE">LIBRE</option>
                                <option value="OCUPADO" selected>OCUPADO</option>
                                <option value="SUCIO">SUCIO</option>
                                @elseif($hab->estadoH == 'SUCIO')
                                <option value="LIBRE">LIBRE</option>
                                <option value="OCUPADO">OCUPADO</option>
                                <option value="SUCIO" selected>SUCIO</option>
                                @endif
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


<script type='text/javascript' src='https://code.jquery.com/jquery-1.11.0.js'></script>
<script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">

</script>