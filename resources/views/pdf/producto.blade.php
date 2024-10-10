<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>{{ $title }}</h1>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $producto)
                <tr>
                    <td>{{ $producto['codigo'] }}</td>
                    <td>{{ $producto['nombre'] }}</td>
                    <td>{{ $producto['descripcion'] ?? 'N/A' }}</td>
                    <td>{{ $producto['categoria'] }}</td>
                    <td>{{ $producto['precio'] }}</td>
                    <td>{{ $producto['stock'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
