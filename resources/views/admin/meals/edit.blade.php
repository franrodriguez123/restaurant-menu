@extends('layouts.admin')

@section('content')
    <div class="toolbar">
        <h2>Editar plato</h2>
        <div></div>
    </div>
    
    <form class="main" method="POST" action="{{ route('meals.update', $meal) }}">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="category_id">Categoría</label>
            <select id="category_id" name="category_id" class="form-control @error('category_id') is-invalid @enderror" autofocus>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id == $meal->category_id) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text"
                id="name"
                name="name"
                value="{{ $meal->name }}"
                class="form-control @error('name') is-invalid @enderror"
                >
        </div>

        <div class="form-group">
            <label for="description">Descripción</label>
            <input type="text"
                id="description"
                name="description"
                value="{{ $meal->description }}"
                class="form-control @error('description') is-invalid @enderror"
                >
        </div>

        <div class="form-group">
            <label for="price">Precio</label>
            <input type="text"
                id="price"
                name="price"
                value="{{ $meal->price }}"
                class="form-control @error('price') is-invalid @enderror"
                >
        </div>

        <div class="form-group">
            <label for="allergens">Alérgenos</label>
            <select id="allergens" name="allergens[]" class="form-control" multiple>
                @foreach ($allergens as $allergen)
                    <option value="{{ $allergen->id }}" @if($meal->allergens()->where('allergen_id', $allergen->id)->count()) selected @endif>{{ $allergen->name }}</option>
                @endforeach
            </select>
        </div>

        <x-submit-button></x-submit-button>
    </form>
@endsection