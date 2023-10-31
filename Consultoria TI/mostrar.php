<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Consulta de Proyectos de Consultoría de TI</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .iniciar
{
	font-family:arial;
	font-size:18px;
	position:relative;
	color:white;
	width:130px;
	height:35px;
	border: 2px solid grey;
	background-color:black;
	outline: none;
	border-radius:10px;
	text-align:center;
	top: 4%;
	left: 80%;
	cursor:pointer;
}
.iniciar:hover
{
	color:orange;
}
    </style>
      <script>
        function cerrar()
        {
    
            window.location.href ="inicioA.html";
        
        }
       
    </script>
</head>
<body>
    <h1>Proyectos de Consultoría de TI</h1>
    <input type='button'  class='iniciar' id="boton" onclick= "cerrar()" value="Regresar" />

    <?php
    // Conexión a la base de datos (ajusta las credenciales según tu configuración)
    $host = '127.0.0.1:3306';
    $dbname = 'project';
    $usuario = 'root';
    $contrasena = '';

    $conexion = new PDO("mysql:host=$host;dbname=$dbname", $usuario, $contrasena);

    // Consulta SQL para seleccionar los proyectos
    $sql = "SELECT * FROM proyectos";
    $consulta = $conexion->query($sql);

    if ($consulta) {
        // Verificar si hay proyectos en la base de datos
        if ($consulta->rowCount() > 0) {
            echo '<table border="1">';
            echo '<tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Cliente</th><th>Fecha de Inicio</th><th>Fecha de Fin</th></tr>';
            
            while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr>';
                echo '<td>'. $fila ['id'] .'</td>';
                echo '<td>' . $fila['Nombre'] . '</td>';
                echo '<td>' . $fila['Descripcion'] . '</td>';
                echo '<td>' . $fila['Cliente'] . '</td>';
                echo '<td>' . $fila['fecha_inicio'] . '</td>';
                echo '<td>' . $fila['fecha_fin'] . '</td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo 'No se encontraron proyectos en la base de datos.';
        }
    } else {
        echo 'Error al recuperar los proyectos.';
    }
    ?>
</body>
</html>
