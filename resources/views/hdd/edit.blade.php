
<a href="{{ url('/hdds/'.$hdd->id.'/edit') }}" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$hdd->id}}">
    Editar
</a>
<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{$hdd->id}}">
    Nuevo HDD
</button>-->
<div class="modal fade" id="editModal{{$hdd->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar datos de HDD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ url('/hdds/'.$hdd->id)}}" method="post" entype="multipart/form-data">
                    @csrf
                    {{method_field('PATCH')}}
                    @include('hdd.form', ['modo'=>'Crear'])
                </form>

            </div>
        </div>
    </div>
</div>

<!--<div class="modal fade" id="editModal{{$hdd->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Nuevo Disco Duro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/hdds/'.$hdd->id)}}" method="post" entype="multipart/form-data">
                    @csrf
                    @include('hdd.form', ['modo'=>'Crear'])
                </form>
            </div>
        </div>
    </div>
</div>-->
