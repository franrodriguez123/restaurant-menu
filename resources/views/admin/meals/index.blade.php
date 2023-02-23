@extends('layouts.admin')

@section('content')
    <div class="toolbar">
        <h2>Platos</h2>
        <div>
            <x-action-button type="create" url="{{ route('meals.create') }}"></x-action-button>
        </div>
    </div>

    <table class="table sortable" data-model="category" data-sortable-list-ajax-update-url="{{ route('sortablelist.update') }}">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($meals as $meal)
                <tr>
                    <td class="id">{{ $meal->id }}</td>
                    <td>{{ $meal->name }}</td>
                    <td>{{ $meal->name }}</td>
                    <td>
                        <x-action-button type="edit" url="{{ route('meals.edit', $meal) }}"></x-action-button>
                        <x-action-button type="destroy" url="{{ route('meals.destroy', $meal) }}"></x-action-button>
                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table>

@endsection