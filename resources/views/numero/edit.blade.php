<a href="{{ url('/numeros/'.$contacto->id.'/edit') }}" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$contacto->id}}">
    <i class="fas fa-pen"></i>
</a>

<div class="modal fade" id="editModal{{$contacto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-info">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">ACTUALIZAR CONTACTO</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ url('/numeros/'.$contacto->id)}}" method="post">
                    @csrf
                    {{method_field('PATCH')}}
                    @include('numero.form', ['modo'=>'Actualizar','$resul'])
                </form>

            </div>
        </div>
    </div>
</div>