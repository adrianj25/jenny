<?php
class ConexionBD {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "tienda_galletas_pan";
    private $conn;

    // Constructor: realiza la conexión a la base de datos
    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }
    }

    // Método para insertar una venta en la base de datos
    public function registrarVenta($producto, $cantidad, $precio, $cliente, $fecha) {
        // Calcular el total
        $total = $cantidad * $precio;

        // Preparar y ejecutar la consulta SQL para insertar
        $sql = "INSERT INTO ventas (producto, cantidad, precio, total, cliente, fecha) 
                VALUES ('$producto', '$cantidad', '$precio', '$total', '$cliente', '$fecha')";

        if ($this->conn->query($sql) === TRUE) {
            return "Venta registrada correctamente.";
        } else {
            return "Error al registrar la venta: " . $this->conn->error;
        }
    }

    // Método para obtener todas las ventas registradas
    public function obtenerVentas() {
        $sql = "SELECT * FROM ventas";
        $result = $this->conn->query($sql);

        $ventas = [];
        if ($result->num_rows > 0) {
            // Guardar las filas de resultados en un arreglo
            while($row = $result->fetch_assoc()) {
                $ventas[] = $row;
            }
        }
        return $ventas;
    }

    // Método para cerrar la conexión
    public function cerrarConexion() {
        $this->conn->close();
    }
}
?>
