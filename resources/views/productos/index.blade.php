<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-4">
        <h1>Lista de Productos</h1>

@if(session('success'))
    <div style="color: green; margin-bottom: 1rem;">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('productos.create') }}">Crear Producto</a>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Rubro</th>
            <th>Subrubro</th>
            <th>Grupo</th>
            <th>Serie</th>
            <th>Sector</th>
            <th>Stock</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->marca->nombre ?? '-' }}</td>
                <td>{{ $producto->rubro->nombre ?? '-' }}</td>
                <td>{{ $producto->subrubro->nombre ?? '-' }}</td>
                <td>{{ $producto->grupo->nombre ?? '-' }}</td>
                <td>{{ $producto->serie ?? '-' }}</td>
                <td>{{ $producto->sector->nombre ?? '-' }}</td>
                <td>{{ $producto->stock ?? 0 }}</td>
                <td>${{ number_format($producto->precio, 2, ',', '.') }}</td>
                <td>
                    <a href="{{ route('productos.edit', $producto->id) }}">Editar</a>

                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

    </div>
</body>
</html>
