<?php
class ConexionBD {
    private $host = 'localhost';
    private $usuario = 'root';
    private $contraseña = '';
    private $base_datos = 'tienda_galletas';
    public $conexion;

    public function __construct() {
        $this->conexion = new mysqli($this->host, $this->usuario, $this->contraseña, $this->base_datos);

        if ($this->conexion->connect_error) {
            die("Error en la conexión: " . $this->conexion->connect_error);
        }
    }

    public function cerrarConexion() {
        $this->conexion->close();
    }
}
?>
