@extends('layouts.install')

@section('content')
    <div class="install">
        <div class="container">
            <div class="pt-5 pb-5">
                <div class="card card-install">
                    <div class="card-body">
                        <h1>¡Gracias!</h1>
                        <p>La aplicación ha sido configurada</p>
                    </div>
                    <div class="card-footer bg-transparent">
                        <a href="{{ route('login') }}" class="btn btn-primary">Iniciar sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection