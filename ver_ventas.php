<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros de Ventas</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f1ea;
            color: #5a3d2b;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fdfcfb;
            border-radius: 10px;
            border: 1px solid #d4b8a8;
        }

        h1 {
            text-align: center;
            color: #8b5e34;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #8b5e34;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #8b5e34;
            color: white;
        }

        .btn-volver {
            margin-top: 20px;
            text-align: center;
        }

        .btn-volver a {
            text-decoration: none;
            background-color: #8b5e34;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            border: 2px solid #8b5e34;
            transition: background-color 0.3s;
        }

        .btn-volver a:hover {
            background-color: #603e23;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registros de Ventas</h1>
        <table>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio por Unidad</th>
                <th>Total</th>
                <th>Cliente</th>
                <th>Fecha</th>
            </tr>

            <?php
            // Conexión a la base de datos
            $conn = new mysqli('localhost', 'root', '', 'tienda_galletas');

            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            // Consulta para obtener los registros de ventas
            $sql = "SELECT producto, cantidad, precio, (cantidad * precio) AS total, cliente, fecha FROM ventas";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['producto']}</td>
                            <td>{$row['cantidad']}</td>
                            <td>\${$row['precio']}</td>
                            <td>\${$row['total']}</td>
                            <td>{$row['cliente']}</td>
                            <td>{$row['fecha']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No hay registros de ventas.</td></tr>";
            }

            $conn->close();
            ?>
        </table>

        <div class="btn-volver">
            <a href="index.html">Volver al Inicio</a>
        </div>
    </div>
</body>
</html>
