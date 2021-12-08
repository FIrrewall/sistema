<a href="{{ url('/descargos/'.$descargo->id.'/edit') }}" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$descargo->id}}">
    Editar
</a>
<div class="modal fade" id="editModal{{$descargo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar datos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ url('/descargos/'.$descargo->id)}}" method="post" entype="multipart/form-data">
                    @csrf
                    {{method_field('PATCH')}}
                    @include('descargo.form', ['modo'=>'Actualizar'])
                </form>

            </div>
        </div>
    </div>
</div>