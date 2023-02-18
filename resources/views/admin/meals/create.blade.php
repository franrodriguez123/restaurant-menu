@extends('layouts.admin')

@section('content')
    <div class="toolbar">
        <h2>Nuevo plato</h2>
        <div></div>
    </div>
    
    <form class="main" method="POST" action="{{ route('meals.store') }}">
        @csrf

        <div class="form-group">
            <label for="category_id">Categoría</label>
            <select id="category_id" name="category_id" class="form-control @error('category_id') is-invalid @enderror" autofocus>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                class="form-control @error('name') is-invalid @enderror"
                >
        </div>

        <div class="form-group">
            <label for="description">Descripción</label>
            <input type="text"
                id="description"
                name="description"
                value="{{ old('description') }}"
                class="form-control @error('description') is-invalid @enderror"
                >
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="text"
                id="price"
                name="price"
                value="{{ old('price') }}"
                class="form-control @error('price') is-invalid @enderror"
                >
        </div>

        <div class="form-group">
            <label for="allergens">Alérgenos</label>
            <select id="allergens" name="allergens[]" class="form-control" multiple>
                @foreach ($allergens as $allergen)
                    <option value="{{ $allergen->id }}">{{ $allergen->name }}</option>
                @endforeach
            </select>
        </div>

        <x-submit-button></x-submit-button>
    </form>
@endsection