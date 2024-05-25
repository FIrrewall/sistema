<a href="{{ url('/inventarioCctvs/'.$inCctv->id.'/edit') }}" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$inCctv->id}}">
    <i class="fas fa-pen"></i>
</a>

<div class="modal fade" id="editModal{{$inCctv->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-info">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">ACTUALIZAR EQUIPO</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ url('/inventarioCctvs/'.$inCctv->id)}}" method="post" entype="multipart/form-data">
                    @csrf
                    {{method_field('PATCH')}}
                    @include('inCctv.form', ['modo'=>'Actualizar','$resul'])
                </form>

            </div>
        </div>
    </div>
</div>