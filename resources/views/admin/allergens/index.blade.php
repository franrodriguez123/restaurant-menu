@extends('layouts.admin')

@section('content')
    <div class="toolbar">
        <h2>Alérgenos</h2>
        <div>
            <x-action-button type="create" url="{{ route('allergens.create') }}"></x-action-button>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allergens as $allergen)
                <tr>
                    <td>{{ $allergen->id }}</td>
                    <td>{{ $allergen->name }}</td>
                    <td>
                        <x-action-button type="edit" url="{{ route('allergens.edit', $allergen) }}"></x-action-button>
                        <x-action-button type="destroy" url="{{ route('allergens.destroy', $allergen) }}"></x-action-button>
                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table>

@endsection