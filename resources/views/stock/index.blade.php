<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Stock de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <h1 class="mb-4 text-center">📦 Stock de Productos</h1>

        <table class="table table-bordered table-striped shadow-sm bg-white">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Ejemplo de productos estáticos -->
                <tr>
                    <td>Remera BASIC</td>
                    <td>Indumentaria</td>
                    <td>$4.500</td>
                    <td>30</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary">Editar</button>
                        <button class="btn btn-sm btn-danger">Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <td>Jean Slim</td>
                    <td>Indumentaria</td>
                    <td>$9.800</td>
                    <td>12</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary">Editar</button>
                        <button class="btn btn-sm btn-danger">Eliminar</button>
                    </td>
                </tr>
                <!-- Aquí irían los productos dinámicos en el futuro -->
            </tbody>
        </table>
    </div>

</body>
</html>

