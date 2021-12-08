@extends('adminlte::page')

@section('title', 'NESTOR CATARI')

@section('content_header')
    <h1>Lista de Usuarios</h1>
@stop

@section('content')

    @livewire('admin.users-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>console.log('hola')</script>
@stop

{{ __('A fresh verification link has been sent to your email address.') }}