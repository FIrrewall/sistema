<div class="container" style="margin-bottom: 100px;">
    <div class="form-row">       
        <div class="col-md-5 mb-3">
            {!! Form::label('codigo', 'Codigo')!!}
            {!! Form::text('codigo', null, ['class'=> 'form-control', 'placeholder'=>'Codigo', 'required']) !!}
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>

        <div class="col-md-5 mb-3">
            {!! Form::label('distribuidor_id', 'Distribuidor')!!}
            {!! Form::select('distribuidor_id', $distribuidores, null, ['class'=>'form-control selectpicker','data-live-search'=>'true']) !!}
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>

        <div class="col-md-2 mb-3">
            {!! Form::text('user_id', Auth::user()->id, ['class'=> 'form-control', 'required','hidden']) !!}
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-4 mb-3">
            {!! Form::label('fecha', 'Fecha')!!}
            {!! Form::date('fecha', null, ['class'=> 'form-control', 'placeholder'=>'fecha', 'required']) !!}
            <div class="valid-feedback">
                Looks good!
            </div>        
        </div>

        <div class="col-md-3 mb-3">
            {!! Form::label('entardacanasta', 'Entrada de Canastillos')!!}
            {!! Form::number('entradacanasta', null, ['class'=> 'form-control', 'placeholder'=>'Entrada Canastillos']) !!}
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>

        <div class="col-md-3 mb-3">
            {!! Form::label('salidacanasta', 'Salida de Canastillos')!!}
            {!! Form::number('salidacanasta', null, ['class'=> 'form-control', 'placeholder'=>'Salida Canastillos']) !!}
            <div class="valid-feedback">
                Looks good!
            </div>
        </div> 
</div>


<div class="card" style="margin-bottom: 0px;">
    <h4>AGREGAR PRODUCTOS</h4>
    <div class="form-row">
        <div class="col-md-3 mb-3">
            {!! Form::label('producto_id', 'Producto')!!}
            {!! Form::select('producto_id', $productos, null, ['class'=>'form-control selectpicker','data-live-search'=>'true']) !!}
            <br>
        </div>

        <div class="col-md-3 mb-3">
            {!! Form::label('salida', 'Salidas')!!}
            {!! Form::number('salida', null, ['class'=> 'form-control', 'placeholder'=>'Salidas']) !!}
        </div>

        <div class="col-md-3 mb-3">
            {!! Form::label('fvencimiento', 'Fecha de Vencimiento')!!}        
            {!! Form::date('fvencimiento', null, ['class'=> 'form-control', 'placeholder'=>'fecha']) !!}         
        </div> 
        <div class="col-md-3 mb-3">
            {!! Form::label('devoluciones', 'Devoluciones')!!}
            {!! Form::number('devoluciones', null, ['class'=> 'form-control', 'placeholder'=>'Devoluciones']) !!}
        </div>   
    </div>
    
    <div class="form-group">
        <button id="agregar" type="button" class="btn btn-primary">AGREGAR PRODUCTO</button>
    </div>
    <div class="form-row">
        <table class="table table-striped" id="detalles">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Producto</th>
                <th scope="col">Salidas</th>
                <th scope="col">Fecha Vencimiento</th>
                <th scope="col">Devoluciones</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>

<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
</script>