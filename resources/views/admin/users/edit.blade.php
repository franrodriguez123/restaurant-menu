@extends('layouts.admin')

@section('content')
    <div class="toolbar">
        <h2>Editar usuario</h2>
        <div></div>
    </div>
    
    <form class="main" method="POST" action="{{ route('users.update', $user) }}">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text"
                id="name"
                name="name"
                value="{{ $user->name }}"
                class="form-control @error('name') is-invalid @enderror"
                >
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email"
                id="email"
                name="email"
                value="{{ $user->email }}"
                class="form-control @error('email') is-invalid @enderror"
                >
        </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password"
                id="password"
                name="password"
                value=""
                class="form-control @error('password') is-invalid @enderror"
                >
                <span class="small">* Deja en blanco las contraseñas si no quieres cambiarla</span>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Repite contraseña</label>
            <input type="password"
                id="password_confirmation"
                name="password_confirmation"
                value=""
                class="form-control @error('password_confirmation') is-invalid @enderror"
                >
        </div>

        <div class="form-group">
            <label for="role_id">Rol</label>
            <select 
                id="role_id"
                name="role_id"
                value="{{ old('role_id') }}"
                class="form-control @error('role_id') is-invalid @enderror"
                >
                <option value="{{ \App\Models\User::ADMIN }}">Administrador</option>
                <option value="{{ \App\Models\User::EMPLOYEE }}" <?php if($user->role_id == \App\Models\User::EMPLOYEE) echo 'selected' ?>>Empleado</option>
            </select>
        </div>

        <x-submit-button></x-submit-button>
    </form>
@endsection