<button type="button" class="btn btn-success" data-toggle="modal" data-target="#nuevosDatos">
    <i class="fas fa-plus-square"></i> Nuevo
</button>
<!-- Modal -->
<div class="modal fade" id="nuevosDatos" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-success">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">NUEVO PRODUCTO</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/productos') }}" method="post" entype="multipart/form-data">
                    @csrf
                    @include('productos.form', ['modo'=>'Guardar'])
                </form>
            </div>
        </div>
    </div>
</div>