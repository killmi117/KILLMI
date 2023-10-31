<?php
session_start();

$var = $_POST['us'];
$var1 = $_POST['pass'];
include('conexion.php');
$sql = "SELECT * from usuarios where Nombre = '$var' and contraseña='$var1'";
$r = $cn->query($sql);

$cont = $r->num_rows;

if (!$r) {
    die("Error de query: " . $cn->error);
} else if ($cont <= 0) {
    $_SESSION['mensaje_error'] = "Usuario y/o contraseña no almacenados. Por favor, regístrese.";
    header('Location: index.php'); // Cambia 'index.html' a 'index.php'
} else {
    $row = $r->fetch_assoc();
    $nombre_usuario_bd = $row['Nombre'];
    $contrasena_bd = $row['contraseña'];

    if ($var === $nombre_usuario_bd && $var1 === $contrasena_bd) {
        if ($var === "Admin" && $var1 === "Admin") {
            // Si el usuario y la contraseña son "Admin", redirige a otro HTML específico
            header('Location: inicioA.html');
        } else {
            header('Location: Consultor de TI.html');
        }
    } else {
        $_SESSION['mensaje_error'] = "Usuario y/o contraseña incorrectos. Por favor, inténtalo de nuevo.";
        header('Location: index.php'); // Cambia 'index.html' a 'index.php'
    }
}




?>