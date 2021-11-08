<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card">
                <div class="card-body">
                    <form action="{{  url('/hdds/'.$hdd->id) }}" method="post" entype="multipart/form-data">
                        @csrf
                        {{method_field('PATCH')}}
                        @include('hdd.form', ['modo'=>'Crear'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>