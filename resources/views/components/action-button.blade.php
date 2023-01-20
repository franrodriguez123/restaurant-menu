@if ($type == 'edit')
    <a href="{{ $url }}" class="btn btn-sm btn-warning text-uppercase">Editar</a>
@elseif ($type == 'destroy')

    <form class="destroy" action="{{ $url }}" method="POST" onsubmit="return confirm('¿Deseas eliminar este elemento?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger text-uppercase">Eliminar</button>
    </form>

@elseif ($type == 'create')
    <a href="{{ $url }}" class="btn btn-sm btn-primary text-uppercase">Añadir</a>
@endif