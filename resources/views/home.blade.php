@extends('adminlte::page')

@section('title', 'Inicio')
<link rel="icon" href="./favicons/favicon.png" type="image/x-icon">


@section('content')

<div class="card-group">
  <div class="card">
    <img src="vendor/adminlte/dist/img/mision.jpg" class="card-img-top" alt="buffalo-skyline" width="200" height="220">
    <div class="card-body">
      <h3 class="card-title-center">Misión</h3>
      <p class="card-text">Brindar soluciones integrales de Innovación Tecnológica y Comunicaciones para su oficina o cualquier lugar de su importancia, cumpliendo con estándares de calidad, actualizándonos día a día y constantemente en todas las disciplinas, para ser reconocidas por nuestros clientes a nivel nacional e internacional.</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Last updated 3 mins ago</small>
    </div>
  </div>
  <div class="card">
    <img src="vendor/adminlte/dist/img/vision.jpg" class="card-img-top" alt="buffalo-skyline" width="200" height="220">
    <div class="card-body">
      <h3 class="card-title-center">Visión</h3>
      <p class="card-text" >Que nuestros clientes nos identifiquen como una empresa líder, eficiente y eficaz; reconociendo a ITC como la mejor alternativa en soluciones integrales en Seguridad Electrónica, Networking, Telefonía, Ingeniería Eléctrica . Que nuestros clientes vean materializado el valor agregado de sus inversiones en la Responsabilidad Social mediante la prestación de servicios profesionales y un mejoramiento continuo.</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Last updated 3 mins ago</small>
    </div>
  </div>
  <div class="card">
    <img src="vendor/adminlte/dist/img/valores.png" class="card-img-top" alt="buffalo-skyline" width="200" height="220">
    <div class="card-body">
      <h3 class="card-title-center">Valores</h3>
      <p class="card-text">Demostrar Responsabilidad, Compromiso frente a todas las tareas que nuestros clientes nos asignan , haciendo primar el cumplimiento y la ética y principalmente el Profesionalismo.</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Last updated 3 mins ago</small>
    </div>
  </div>
</div>
<!--<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="vendor/adminlte/dist/img/dashboard1.jpg"  class="d-block w-100" alt="buffalo-skyline" width="640" height="400">
    </div>
    <div class="carousel-item">
      <img src="vendor/adminlte/dist/img/dashboard2.png" class="d-block w-100" alt="buffalo-skyline" width="640" height="400">
    </div>
    <div class="carousel-item">
      <img src="vendor/adminlte/dist/img/dashboard3.jpg" class="d-block w-100" alt="buffalo-skyline" width="640" height="400">
    </div>
  </div>
</div>-->



@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('hola')
</script>
@stop