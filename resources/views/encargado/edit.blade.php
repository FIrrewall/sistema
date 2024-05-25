<div class="btn-group btn-group-sm">
    <a href="{{ url('/encargados/'.$encar->id.'/edit') }}" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$encar->id}}">
        <i class="fas fa-pen"></i>
    </a>
</div>


<!-- Modal -->
<div class="modal fade" id="editModal{{$encar->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-info">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">ACTUALIZAR ENCARGADO</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/encargados/'.$encar->id)}}" method="post" entype="multipart/form-data">
                    @csrf
                    {{method_field('PATCH')}}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlInput1">Nombre</label>
                            <input type="text" class="form-control" name="nombreE" value="{{$encar->nombreE}}" id="nombre" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label sfor="exampleFormControlInput1">Apellido Paterno</label>
                            <input type="text" class="form-control" name="paternoE" value="{{$encar->paternoE}}" id="paterno" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlInput1">Apellido materno</label>
                            <input type="text" class="form-control" name="maternoE" value="{{$encar->maternoE}}" id="materno" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlInput1">CI</label>
                            <input type="text" class="form-control" name="ciE" value="{{$encar->ciE}}" id="ci" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlInput1">Nº celular</label>
                            <input type="number" class="form-control" name="celularE" value="{{$encar->celularE}}" id="celular" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlInput1">Nombre del alojamiento</label>
                            <select id="alojamiento_id" name="alojamiento_id" class="form-control">
                                @foreach($aloja as $alo)
                                @if($alo->id == $encar->alojamiento_id)
                                <option value="{{$alo->id}}" selected>{{$alo->nombreA}}</option>
                                @break
                                @endif
                                @endforeach
                                @foreach($aloja as $aloj)
                                @if($aloj->id != $encar->alojamiento_id)
                                <option value="{{$aloj->id}}">{{$aloj->nombreA}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlInput1">Usuario</label>
                            <select id="users_id" name="users_id" class="form-control">
                                @foreach($users as $use)
                                @if($use->id == $encar->users_id)
                                <option value="{{$use->id}}" selected>{{$use->name}}</option>
                                @endif
                                @endforeach
                                @foreach($users as $user)
                                @if($user->id != $encar->users_id)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endif
                                @endforeach
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