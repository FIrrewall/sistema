<a href="{{ url('/trabajosRealizados/'.$trabajo->id.'/edit') }}" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$trabajo->id}}">
    Editar
</a>

<div class="modal fade" id="editModal{{$trabajo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar datos del Equipo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ url('/trabajosRealizados/'.$trabajo->id)}}" method="post" entype="multipart/form-data">
                    @csrf
                    {{method_field('PATCH')}}
                    @include('trabajo.form', ['modo'=>'Crear'])
                </form>

            </div>
        </div>
    </div>
</div>