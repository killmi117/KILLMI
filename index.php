
<html>

<head>	
	<meta charset="UTF-8" />
			<link rel="stylesheet" href="css/estilo.css"/>
	<script>
		    <?php
    session_start();
    if (isset($_SESSION['mensaje_error'])) {
    ?>
        // Mostrar el mensaje de error como una ventana emergente
        alert("<?php echo $_SESSION['mensaje_error']; ?>");

        // Limpia el mensaje después de mostrarlo
        <?php
        unset($_SESSION['mensaje_error']);
    }
    ?>
			function crear()
		{

			window.location.href ="registro.html";
		
		}
	     // Agregar un límite de intentos
		 let intentos = 0;
        const limiteIntentos = 3; // Número máximo de intentos permitidos

        function validarFormulario() {
            intentos++;

            if (intentos >= limiteIntentos) {
                alert("Has excedido el número máximo de intentos de inicio de sesión. Tu cuenta está bloqueada.");
                // Aquí puedes redirigir al usuario a una página de bloqueo o tomar medidas adicionales.
            } else {
                // Continuar con la validación y el envío del formulario
                const usuario = document.getElementById("user").value;
                const contraseña = document.getElementById("pass").value;

                // Realiza la validación de usuario y contraseña aquí
                // Si la validación es exitosa, redirige al usuario a la página de inicio
                // Si falla, muestra un mensaje de error o realiza la lógica necesaria.
                if (usuario && contraseña) {
                    // Si los campos de usuario y contraseña no están vacíos, envía el formulario
                    return true;
                } else {
                    // Muestra un mensaje de error en la página "index"
                    const mensajeError = "Por favor, completa ambos campos.";
                    document.getElementById("mensajeError").textContent = mensajeError;
                    return false;
                }
            }
        }

        // Función para obtener parámetros de la URL
        function obtenerParametro(nombre) {
            const url = new URL(window.location.href);
            return url.searchParams.get(nombre);
        }

        // Verificar si hay un mensaje en la URL
        const mensaje = obtenerParametro('mensaje');
        if (mensaje) {
            // Mostrar el mensaje de error
            alert(decodeURIComponent(mensaje));
        }
		
   
          
	</script>
	</head>
			<body id = "pagina">
            <audio autoplay controls style="display:none;">
        <source src="music" type="audio/mpeg">
        Tu navegador no soporta la reproducción de audio.
    </audio>
			<div id="logo">
				<h1 class="titulo" >TI Consultor</h1>
			<p class= "texto_arial">"Transformamos desafíos tecnológicos en soluciones estratégicas: Tu socio de confianza en Consultoría de TI."</p>
				</div>
			<form action= "validar.php" method="POST"  onsubmit="return validarFormulario();">
				<div id="login">
		   

			<p class="text">Usuario<br><input  type= "text" name="us" id="user"><br></p>
				
			<p class="text">Contraseña<br><input type="password" name="pass" id="pass"><br></p>
				
			<input  type="Submit"  class="boton" value= "INICIAR SESION" />
			
	        <input  type="button" onclick= "crear()" id="registro" value="CREAR UNA CUENTA" />
	 	</div>
	</form>
			
				<p id="mensajeError" style="color: red;"></p> <!-- Este es el espacio para mostrar el mensaje de error -->

			</body>
         				
		</html>
	