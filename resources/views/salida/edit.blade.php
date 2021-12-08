<a href="{{ url('/salidas/'.$salida->id.'/edit') }}" class="btn btn-warning" data-toggle="modal" data-target="#editarModal{{$salida->id}}">
    Editar
</a>

<div class="modal fade" id="editarModal{{$salida->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar datos del Equipo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ url('/salidas/'.$salida->id)}}" method="post" entype="multipart/form-data">
                    @csrf
                    {{method_field('PATCH')}}
                    @include('salida.form', ['modo'=>'Crear'])
                </form>

            </div>
        </div>
    </div>
</div>