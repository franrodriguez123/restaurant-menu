@extends('layouts.admin')

@section('content')
    <div class="toolbar">
        <h2>Categorías</h2>
        <div>
            <x-action-button type="create" url="{{ route('categories.create') }}"></x-action-button>
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
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <x-action-button type="edit" url="{{ route('categories.edit', $category) }}"></x-action-button>
                        <x-action-button type="destroy" url="{{ route('categories.destroy', $category) }}"></x-action-button>
                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table>

@endsection