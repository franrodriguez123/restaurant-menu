@extends('layouts.admin')

@section('content')
    <div class="toolbar">
        <h2>Código QR</h2>
        <div></div>
    </div>

    <p>Usa el siguiente código QR para tu carta. Haz clic derecho sobre la imagen y selecciona "Guardar imagen..."</p>

    <img src="{{ $data }}">

@endsection