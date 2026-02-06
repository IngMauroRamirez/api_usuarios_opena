<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tareas del usuario</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 40px;
            color: #333;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        }

        h2 {
            margin-bottom: 20px;
            color: #2c3e50;
            border-bottom: 2px solid #eaeaea;
            padding-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        thead {
            background-color: #2c3e50;
            color: #ffffff;
        }

        th, td {
            padding: 12px 10px;
            text-align: left;
        }

        th {
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 0.5px;
        }

        tbody tr {
            border-bottom: 1px solid #eaeaea;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #eef3f7;
        }

        td {
            font-size: 14px;
        }

        .valor {
            font-weight: bold;
            color: #27ae60;
        }

        .tarifa {
            color: #2980b9;
        }

        .horas {
            text-align: center;
        }

        .footer {
            margin-top: 20px;
            font-size: 13px;
            color: #777;
            text-align: right;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>Tareas de {{ $usuario->name }}</h2>

    <table>
        <thead>
            <tr>
                <th>Tarea</th>
                <th>Proyecto</th>
                <th>Horas</th>
                <th>Tarifa</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuario->tareas as $tarea)
                @php
                    $tarifa = $tarea->proyecto
                        ->usuarios
                        ->where('id', $usuario->id)
                        ->first()
                        ->pivot
                        ->tarifa;
                @endphp
                <tr>
                    <td>{{ $tarea->titulo }}</td>
                    <td>{{ $tarea->proyecto->nombre }}</td>
                    <td class="horas">{{ $tarea->horas }}</td>
                    <td class="tarifa">${{ number_format($tarifa, 0, ',', '.') }}</td>
                    <td class="valor">${{ number_format($tarifa * $tarea->horas, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Total de tareas: {{ $usuario->tareas->count() }}
    </div>

</div>

</body>
</html>
