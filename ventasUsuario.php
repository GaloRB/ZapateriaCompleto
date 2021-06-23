<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header("Location:index.php");
    }else{
        
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ballet&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../imagenes/Icono.png">
    <title>Declean Glamoure</title>
</head>

<body>
    <h1 class="text-center m-3">Declean Glamoure</h1>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light bg-dark border border-danger img-fluid">
        
    </nav>
    <button type="button" class="btn btn-dark m-2"><a href="inventarioUsuario.php" class="badge badge-dark">Regresar</a></button>


    <h2 class="text-center m-4"> Ventas </h2>
        <div class="bg-dark w-50 my-0 mx-auto">
          <ul class="nav flex-column">
            <li class="nav-item">
                  <div class="" >
                            <li><a class="dropdown-item text-center text-light h5 p-2" href="usuario/crearVentausuario.php">Crear Venta</a></li>
                            
                            <li><a class="dropdown-item text-center text-light h5 p-2" href="usuario/verFacturasUsuario.php">Facturas En Sistema</a></li>

                            <li><a class="dropdown-item text-center text-light h5 p-2" href="usuario/imprimirFactura.php">Imprimir Venta</a></li>
                            
                  </div>
            </li>
          </ul>
        </div>

    <?php
    require_once ('includes/footer.php');
    ?>

    
    <script src="js/bootstrap.bundle.js"></script>
</body> 

</html>
<?php
    }
   ?>