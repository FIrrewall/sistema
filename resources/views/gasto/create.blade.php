<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevosInAlarma">
    Nuevo equipo
</button>
<!-- Modal -->
<div class="modal fade" id="nuevosInAlarma" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Nuevo Equipo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/gastos') }}" method="post" entype="multipart/form-data">
                    @csrf
                    @include('gasto.form', ['modo'=>'Crear'])
                </form>
            </div>
        </div>
    </div>
</div>