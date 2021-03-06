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
    <title>Cancelar Venta | Declean Glamoure</title>
</head>
<body>
<h1 class="text-center m-3">Declean Glamoure</h1>
<nav class="navbar navbar-expand-lg navbar-light bg-light bg-dark border border-danger img-fluid">
    </nav>
    <button type="button" class="btn btn-dark m-2"><a href="../ventas.php" class="badge badge-dark">Regresar</a></button>
    <div class="container-fluid mt-2 w-75">
    
        <h2 class='text-center'>Cancelar Venta</h2>
    </div>

    <!-- Formulario para venta -->
    <div class="container-fluid mt-5 w-25">
             
        <form method="POST" id="formCancelar" action="cancelar.php" >
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Codigo de venta</label>
                <input type="number" name="codigo" id="codigo" class="form-control" min="0" pattern="^[0-9]+" required class="form-control" placeholder="Codigo"> 
            </div>

            
            
             <div class="mt-2 invisible" id="respuesta">
                <div id="alertaForm" class="alert alert-danger text-center" role="alert">
                    
                </div>
            </div>
            
            <div class="d-flex justify-content-center">
                <button  type="submit" id="consultar" name="consultar" class="btn btn-primary">Consultar factura</button>
            </div>
            
        </form>
            
    </div>
    

<footer class="texto bg-dark text-light p-3 mt-5 d-flex justify-content-between">
        <p><a class="nav-link active text-center text-light h5" aria-current="page" href="../config/sesion.php">Salir</a></p>
        <p>Empleado conectado: <span> <?php echo $_SESSION["nombre"]; ?> </span> </p>
    </footer>

         
         <script src="../js/bootstrap.bundle.js"></script>
         <script src="../js/script-cancelar.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>
</html>

<?php 
    }
    ?>