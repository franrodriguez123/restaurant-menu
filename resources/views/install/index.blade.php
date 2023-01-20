@extends('layouts.install')

@section('content')
    <div class="install">
        <div class="container">
            <div class="pt-5 pb-5">
                <div class="card card-install">
                    <div class="card-body">
                        <h1>Bienvenido</h1>
                        <p>Vamos a configurar la aplicación por primera vez</p>
                    </div>
                    <div class="card-footer bg-transparent">
                        <a href="{{ route('install.user') }}" class="btn btn-primary">Empezar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection