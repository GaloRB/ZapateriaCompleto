<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login | Declean Glamour</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@624&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Andika+New+Basic&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Ballet&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
	<link rel="shortcut icon" href="imagenes/Icono.png">
	<link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
		 <h1 class="text-center m-3">Declean  Glamoure</h1>
    <nav class="navbar navbar-expand-lg navbar-light bg-light bg-dark border border-danger img-fluid">

    </nav>
    <p> 
    	<br>
		<img src="imagenes/Inicio1.jpg" alt="imagenInicio"  width="600" height="400" align="right">
		<form class="form-login" id="form" action="" method="POST">
			
            <div class="d-flex justify-content-center flex-column mt-4">
                    <!-- <input type="text" class="texto">
                    <button class="btn btn-leer">pulsar para leer..</button> -->
                <button type="button" class="btn btn-grabar btn-secondary fs-4">pulsar para Grabar...</button>
                <p class="contenido pt-5 fs-1"></p>
            </div>
			
			<button type="button" class="btn btn-dark m-2 fs-5"><a href="index.php" class="badge badge-dark">Inicio Normal</a></button>
			<div class="tex-center d-flex justify-content-around">

				
			</div>
			<?php
				/*if(isset($_GET["error"])){
					echo "<h3> Verifique su usuario y/o contraseña</h3>";
				}
				*/
			?>
		<div class="mt-2 invisible" id="respuesta">
			<div id="alertaForm" class="alert alert-danger text-center" role="alert">
                 
            </div>
		</div>
		</form>
		
		</p>
	
    <script src="js/inicioVoz.js"></script>
    <script src="js/bootstrap.bundle.js"></script>

</body>
</html>
