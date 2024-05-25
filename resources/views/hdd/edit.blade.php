<a href="{{ url('/hdds/'.$hdd->id.'/edit') }}" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$hdd->id}}">
    <i class="fas fa-pen"></i>
</a>


<!-- Modal -->
<div class="modal fade" id="editModal{{$hdd->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-info">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">ACTUALIZAR HDD</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/hdds/'.$hdd->id)}}" method="post" entype="multipart/form-data">
                    @csrf
                    {{method_field('PATCH')}}
                    @include('hdd.form', ['modo'=>'Actualizar','$resul'])
                </form>
            </div>
        </div>
    </div>
</div>