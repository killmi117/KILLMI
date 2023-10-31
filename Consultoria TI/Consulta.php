<?php
session_start();
$var = $_POST['txtus'];
$var1 = $_POST['txtpas'];
include('conexion.php');

// Validación adicional para evitar "Admin" como usuario y contraseña
if ($var === 'Admin' && $var1 === 'Admin') {
    $mensaje_error = "No puedes usar 'Admin' como usuario y contraseña. Por favor, elige otro.";
    header('Location: registro.html?mensaje=' . urlencode($mensaje_error));
} else {
    $sql = "INSERT INTO usuarios (Nombre, contraseña) VALUES ('$var', '$var1')";
    if ($cn->query($sql) === TRUE) {
        // Registro exitoso, redirige a la página de éxito
        header('Location: index.php');
    } else {
        die("Error al registrar: " . $cn->error);
    }
}
?>
