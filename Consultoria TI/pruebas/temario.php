<?php session_start(); ?>
<html>
	<head>
		<title>Inicio</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/estilo.css">
		<script>
			function ingresar()
			{
				opc=document.getElementById("boton").value;
				if(opc=='Cerrar Sesion')
					location.href="logout.php";
				else
					location.href="login.html";
			}
		</script>
	</head>
	<body>
		<header>
			<nav id="nav1">
				<img src="img/logo.png" width="140px" id="logo" class="posrel" />
				<a href="index.php" class="navtxt" id="inicio">Inicio</a>
				<a href="temario.php" class="navtxt" id="quees">Temario</a>
				<a href="cruzigramas.php" class="navtxt" id="lenguajes">Crucigramas</a>
				<a  href="" class="navtxt1" id="faq"> proximamente</a>
				<input type='button'  class='iniciar' id="boton" onclick="ingresar()" <?php if(!isset($_SESSION['usuario'])) {echo "value='Iniciar Sesion'";} else { echo "value='Cerrar Sesion'"; } ?> />
				<img src="img/fb.png" width="60px" class="posabs" id="fb" />
				<img src="img/twitter.png" width="40px" class="posabs" id="twit" />
				<img src="img/instagram.png" width="40px" class="posabs" id="inst" />
			</nav>
		</header>
		<div class="posrel" id="div1">
			<form name="formulario1" method="post" action="">
				<label class="letrablanca">MENU PRINCIPAL
					<select name="destinos" onchange="location.href=formulario1.destinos.value;">
				<option selected value=""> Elige una opcion </option>

			<optgroup label="Lenguajes de programacion">
				<option value="prueba.php">C# </option>
				<option value="">Mas proximamente</option>
			</optgroup>

			<optgroup label="Sobre Nosotros">
				<option value= "sobre.html">Sobre nosotros</option>
				<option value= "">Acerca de</option>
			</optgroup>
			
			<optgroup label="Quejas o Sugerencias">
				<option value= "">Quejas</option>
				<option value= "">Sugerencias</option>
				<option value= "">conctato</option>
			</optgroup>
			
			<optgroup label="Usuario">
				<option value= "">Configuracion de la cuenta</option>
				<option value="index.html">Cerrar sesion</option>
			</optgroup>
</select></label>
</div>
</form>
		</div>
		
	</body>
</html>