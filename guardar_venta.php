<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tienda_galletas_pan";  // Nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$producto = $_POST['producto'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];
$cliente = $_POST['cliente'];
$fecha = $_POST['fecha'];

// Calcular el total
$total = $cantidad * $precio;

// Insertar los datos en la base de datos
$sql = "INSERT INTO ventas (producto, cantidad, precio, total, cliente, fecha) VALUES ('$producto', '$cantidad', '$precio', '$total', '$cliente', '$fecha')";

if ($conn->query($sql) === TRUE) {
    echo "Venta registrada correctamente.";
} else {
    echo "Error al registrar la venta: " . $conn->error;
}

$conn->close();
?>
