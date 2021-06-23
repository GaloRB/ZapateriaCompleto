<?php
require ('../config/conection.php');

    session_start();
    if(!isset($_SESSION["autenticado"])){
        header("Location:../index.php");
        
    }else{
   


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ballet&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../imagenes/Icono.png">
    <title>Facturas | Declean Glamoure</title>
</head>
<body>
<h1 class="text-center m-3">Declean Glamoure</h1>
<nav class="navbar navbar-expand-lg navbar-light bg-light bg-dark border border-danger img-fluid">
    </nav>
    <button type="button" class="btn btn-dark m-2"><a href="../ventas.php" class="badge badge-dark">Regresar</a></button>
    <div class="container-fluid mt-5 w-75">
    
    <form class="container-fluid mt-5 w-25" method="POST" action="consultarfecha.php">
                   
                   <label for="tipoUsuario">Selecciona una fecha</label>
                   <div class="form-group row">
                        <label for="example-date-input" class="col-2 col-form-label">Date</label>
                        <div class="col-10">
                            <input class="form-control" name="fecha" required type="date"  id="fecha">
                        </div>
                    </div>
                   
                   <button type="submit" name="conslutar" id="consultar" class="btn btn-primary mt-3">Consultar facturas</button>
                   <!-- Div de alerta en casi de datos incorrectos -->
                   <div class="mt-2 invisible none" id="answer">
                       <div id="alertForm" class="alert alert-danger text-center" role="alert">

                       </div>
                   </div>
           </form>


<footer class="texto bg-dark text-light p-3 mt-5 d-flex justify-content-between">
        <p><a class="nav-link active text-center text-light h5" aria-current="page" href="../config/sesion.php">Salir</a></p>
        <p>Empleado conectado: <span> <?php echo $_SESSION["nombre"]; ?> </span> </p>
    </footer>

         
         <script src="../js/bootstrap.bundle.js"></script>
         
        
</body>
</html>

<?php 
    }
    ?>