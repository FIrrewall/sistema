<div class="btn-group btn-group-sm">
    <a href="{{ url('/permissions/'.$permission->id.'/edit') }}" class='btn btn-warning' data-toggle="modal" data-target="#editModal{{$permission->id}}">
        <i class="fas fa-pen"></i>
    </a>
</div>

<div class="modal fade" id="editModal{{$permission->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-info">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Editar datos del Equipo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ url('/permissions/'.$permission->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{method_field('PATCH')}}
                    @include('permissions.form', ['modo'=>'Actualizar'])
                </form>

            </div>
        </div>
    </div>
</div>