<?php
$host = "localhost";
$usuario = "id20231937_killmi";
$contrasena = "Killmi_199348";
$base_de_datos = "id20231937_constructora";

// Crear una conexión
$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
} else {
    // La conexión se ha establecido con éxito
    echo "Conexión exitosa a la base de datos.";
}

// Ahora puedes realizar consultas y operaciones en la base de datos

// No olvides cerrar la conexión cuando hayas terminado
$conexion->close();
?>
