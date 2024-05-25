<a href="{{ url('/productos/'.$producto->id.'/edit') }}" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$producto->id}}">
    <i class="fas fa-pen"></i>
</a>


<div class="modal fade" id="editModal{{$producto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-info">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">ACTUALIZAR PRODUCTO</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ url('/productos/'.$producto->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{method_field('PATCH')}}
                    @include('producto.form', ['modo'=>'Actualizar'])
                </form>

            </div>
        </div>
    </div>
</div>