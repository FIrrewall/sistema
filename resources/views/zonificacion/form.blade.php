<div class="form-row">
    <div class="form-group col-md-4">
        <label for="exampleFormControlInput1">ID Informe</label>
        <select id="informe_id" name="informe_id" class="form-control">
            <option value="{{$id}}">{{$resul}}</option>
        </select>
    </div>
    <div class="form-group col-md-4">
        <label for="exampleFormControlInput1">Nombre del Modulo</label>
        <input type="text" class="form-control" name="nombreModulo" value="{{ isset($zona->nombreModulo)? $zona->nombreModulo:old('nombreModulo') }}" id="nombreModulo" required>
    </div>
    <div class="form-group col-md-4">
        <label for="exampleFormControlInput1">Identificacion</label>
        <select id="numeroSerie" name="numeroSerie" class="form-control">
            <option value="Zona">Zona</option>
            <option value="PGM">PGM</option>
        </select>
        <!--<input type="text" class="form-control" name="numeroSerie" value="{{ isset($zona->numeroSerie)? $zona->numeroSerie:old('numeroSerie') }}" id="numeroSerie">-->
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-4">
        <label for="exampleFormControlInput1">Numero de Zona/PGM</label>
        <input type="number" class="form-control" name="numeroZona" value="{{ isset($zona->numeroZona)? $zona->numeroZona:old('numeroZona') }}" id="numeroZona" required>
    </div>
    <div class="form-group col-md-4">
        <label for="exampleFormControlInput1">Numero de Particion</label>
        <select id="numeroParticion" name="numeroParticion" class="form-control" onchange="select();">

            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="0">0</option>
        </select>

        <!--<input type="number" class="form-control" name="numeroParticion" value="{{ isset($zona->numeroParticion)? $zona->numeroParticion:old('numeroParticion') }}" id="numeroParticion">-->
    </div>
    <div class="form-group col-md-4">
        <label for="exampleFormControlInput1">Nombre Particion</label>
        <select id="nombreParticion" name="nombreParticion" class="form-control" onchange="select1();">
            <option value="Ambiente">Ambiente</option>
            <option value="Boveda">Boveda</option>
            <option value="Atm">Atm</option>
            <option value="Microcredito">Microcredito</option>
            <option value="Custodia">Custodia</option>
            <option value="Archivo">Archivo</option>
            <option value="Preboveda">Preboveda</option>
            <option value="Boveda auxiliar">Boveda auxiliar</option>
            <option value="Embose">Embose</option>
            <option value="Ninguno">Ninguno</option>
        </select>
        <!--<input type="text" class="form-control" name="nombreParticion" value="{{ isset($zona->nombreParticion)? $zona->nombreParticion:old('nombreParticion') }}" id="nombreParticion">-->
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="exampleFormControlInput1">Nombre del Sensor</label>
        <select id="nombreSensor" name="nombreSensor" class="form-control" value="{{ isset($zona->nombreSensor)? $zona->nombreSensor:old('nombreSensor') }}">
            <option value="Contacto magnetico">Contacto magnetico</option>
            <option value="Sensor dual">Sensor dual</option>
            <option value="Sensor de humo">Sensor de humo</option>
            <option value="Sensor de movimiento">Sensor de movimiento</option>
            <option value="Sensor de vibracion">Sensor de vibracion</option>
            <option value="Boton de panico">Boton de panico</option>
            <option value="Sensor rutura de vidrio">Sensor rutura de vidrio</option>
            <option value="Sensor de humedad">Sensor de humedad</option>
            <option value="Sensor de temperatura">Sensor de temperatura</option>
            <option value="Jalador contra incendios">Jalador contra incendios</option>
            <option value="Luz estroboscopica">Luz estroboscopica</option>
            <option value="Ninguno">Ninguno</option>
        </select>
        <!--<input type="text" class="form-control" name="nombreSensor" value="{{ isset($zona->nombreSensor)? $zona->nombreSensor:old('nombreSensor') }}" id="nombreSensor">-->
    </div>
    <div class="form-group col-md-6">
        <label for="exampleFormControlInput1">Descripcion</label>
        <input type="text" class="form-control" name="descripcion" value="{{ isset($zona->descripcion)? $zona->descripcion:old('descripcion') }}" id="descripcion" required>
    </div>
</div>
<div class="modal-footer justify-content-between">
    @csrf
    <a href="{{ url('/zonas/'.$id) }}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Atras</a>
    <!--<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-undo-alt"></i> Atras</button>-->
    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> {{$modo}}</button>
</div>

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@include('sweetalert::alert')

<script type="text/javascript">
    //var sel = document.getElementById( 'codigoProducto' );
    //var index = sel.selectedIndex;
    var selection = document.getElementById("numeroParticion");
    var descripcion = document.getElementById("nombreParticion");

    function select() {
        for (var i = 0; i < descripcion.length; i++) {
            if (selection.selectedIndex == descripcion[i].index) {
                descripcion.options[i].selected = true;
                //console.log(descripcion[i].text);
            }
        }
    }

    function select1() {
        for (var i = 0; i < selection.length; i++) {
            if (descripcion.selectedIndex == selection[i].index) {
                selection.options[i].selected = true;
                //console.log(selection[i].text);
            }
        }
    }
</script>

@endsection
