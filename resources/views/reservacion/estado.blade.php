<a href="{{ url('/reservacion/'.$reser->id) }}" class="btn btn-dark" data-toggle="modal" data-target="#editarModal{{$reser->id}}">
    <i class="fas fa-hand-holding-usd"></i>
</a>


<!-- Modal -->
<div class="modal fade" id="editarModal{{$reser->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">SALIDA DE CLIENTE </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/reservacion/'.$reser->id) }}" method="post" entype="multipart/form-data">
                    @csrf
                    {{method_field('PATCH')}}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlInput1">Costo de Habitacion</label>
                            <select id="costo" name="costo" class="form-control">
                                <option value="" selected>{{ $reser->total}}.- Bs</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlInput1">Costo de Consumo</label>
                            <select id="costo" name="costo" class="form-control">
                                @foreach($pagar as $pago)
                                @if($pago->idRe == $reser->id)
                                <option value="" selected>{{ $pago->total}}.- Bs</option>
                                @break
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="exampleFormControlInput1">Estado de la habitacion</label>
                            <select id="habitacionE" name="habitacionE" class="form-control">
                                @if($reser->estado == 'SUCIO' || $reser->estado == 'OCUPADO')
                                <option value="SUCIO" selected>SUCIO</option>
                                <option value="LIBRE">LIBRE</option>
                                @elseif($reser->estado == 'LIBRE')
                                <option value="SUCIO">SUCIO</option>
                                <option value="LIBRE" selected>LIBRE</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <input type="hidden" class="form-control" name="habiId" value="{{$reser->habitacion_id}}" id="habiId" required>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        @csrf
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-outline-light">Pagar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>