@extends('layouts.install')

@section('content')
    <div class="install">
        <div class="container">
            <div class="pt-5 pb-5">
                <div class="card card-install">
                    <form action="{{ route('install.finish') }}" method="get">
                        @csrf
                        <div class="card-body">
                            <h1>Agregar usuario</h1>
                            <p>Vamos a crear el primer usuario de tipo administrador</p>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" name="name" value="" required autofocus>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="" placeholder="ejemplo@email.com" required>
                            </div>
                            <div class="form-group">
                                <label>Contraseña</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent">
                            <input type="submit" class="btn btn-primary" value="Terminar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection