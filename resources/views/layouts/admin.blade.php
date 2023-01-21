<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/admin.scss', 'resources/js/app.js', 'resources/js/admin.js'])
</head>
<body>
    <main>
        <div class="container">

            <nav class="navbar navbar-expand-lg border-bottom">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link">Escritorio</a></li>
                            <li class="nav-item"><a href="{{ route('categories.index') }}" class="nav-link">Categorías</a></li>
                            <li class="nav-item"><a href="{{ route('users.index') }}" class="nav-link">Usuarios</a></li>
                            <li class="nav-item">
                                <div class="dropdown">
                                    <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Mi perfil</a></li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}">Cerrar sesión</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="content">

                @if ($errors->any())
                    <div class="alert alert-danger mt-2">
                        <p>Se han encontrado los siguientes errores:</p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if ($message = Session::get('success'))
                    <div class="alert alert-success mt-2">
                        {{ $message }}
                    </div>
                @endif

                @if ($message = Session::get('warning'))
                    <div class="alert alert-warning mt-2">
                        {{ $message }}
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </main>
</body>
</html>