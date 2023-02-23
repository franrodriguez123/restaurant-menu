@extends('layouts.install')

@section('content')
    <div class="install">
        <div class="container">
            <div class="pt-5 pb-5">
                <div class="card card-install">
                    <form action="{{ route('install.user') }}" method="get">
                        @csrf
                        <div class="card-body">
                            <h1>Empresa</h1>
                            <p>Datos básicos de tu empresa. 
                                Podrás completar la información de tu empresa una vez y hayas iniciado sesión.</p>

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
                                <label>Nombre de tu empresa</label>
                                <input type="text" class="form-control" name="company_name" value="" required autofocus>
                            </div>
                            <div class="form-group">
                                <label>Email de contacto</label>
                                <input type="email" class="form-control" name="company_email" value="" placeholder="ejemplo@email.com" required>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent">
                            <input type="submit" class="btn btn-primary" value="Continuar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection