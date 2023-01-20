@extends('layouts.admin')

@section('content')
    <div class="toolbar">
        <h2>Editar categoría</h2>
        <div></div>
    </div>
    
    <form class="main" method="POST" action="{{ route('categories.update', $category) }}">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text"
                id="name"
                name="name"
                value="{{ $category->name }}"
                class="form-control @error('name') is-invalid @enderror"
                autofocus
                >
        </div>

        <x-submit-button></x-submit-button>
    </form>
@endsection