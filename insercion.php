<?php
// Conexión a la base de datos (ajusta las credenciales según tu configuración)
$host = '127.0.0.1:3306';
$dbname = 'project';
$usuario = 'root';
$contrasena = '';

$conexion = new PDO("mysql:host=$host;dbname=$dbname", $usuario, $contrasena);

// Obtén los datos del formulario
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$cliente = $_POST['cliente'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];

// Prepara la consulta SQL de inserción
$sql = "INSERT INTO proyectos (nombre, descripcion, cliente, fecha_inicio, fecha_fin) VALUES (?, ?, ?, ?, ?)";
$consulta = $conexion->prepare($sql);

// Ejecuta la consulta con los datos del formulario
$consulta->execute([$nombre, $descripcion, $cliente, $fecha_inicio, $fecha_fin]);

if ($consulta) {
    echo "Proyecto agregado con éxito.";
    header('Location: inicioA.html');
} else {
    echo "Error al agregar el proyecto.";
}
?>
