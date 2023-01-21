@extends('layouts.admin')

@section('content')
    <div class="toolbar">
        <h2>Usuarios</h2>
        <div>
            <x-action-button type="create" url="{{ route('users.create') }}"></x-action-button>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role_id == \App\Models\User::ADMIN ? 'Administrador' : 'Empleado' }}</td>
                    <td>
                        <x-action-button type="edit" url="{{ route('users.edit', $user) }}"></x-action-button>
                        <x-action-button type="destroy" url="{{ route('users.destroy', $user) }}"></x-action-button>
                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table>

@endsection