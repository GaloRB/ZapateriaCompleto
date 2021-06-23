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
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav mx-auto">
                    
                    <br>
                    <li class="nav-item px-5">
                        <a class="nav-link active text-center text-light h5" aria-current="page" href="usuario/disponibles.php">
                            <img src="Imagenes/shop.ico"> Consultar disponibles</a>
                    </li>
                    <br>
                    <li class="nav-item px-5">
                        <a class="nav-link active text-center text-light h5" href="usuario/agotados.php">
                            <img src="Imagenes/inventario1.ico"> Consultar agotados</a>
                    </li>

                    <li class="nav-item px-5">
                        <a class="nav-link active text-center text-light h5" href="usuario/proveedores.php">
                            <img src="Imagenes/ingresos.ico"> Consultar proveedores</a>
                    </li>

                    <li class="nav-item px-5">
                        <a class="nav-link active text-center text-light h5" aria-current="page" href="ventasUsuario.php">
                        <img src="Imagenes/shop.ico"> Ventas</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <h2 class="text-center m-5">Bienvenido al sistema de control</h2>
    <div class="imagen-zapatos mb-5">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="imagenes/zapatos.jpg" class="d-block w-100" alt="fotos de zapatos">
                </div>
                
                <div class="carousel-item">
                    <img src="imagenes/zapatos2.jpg" class="d-block w-100" alt="fotos de zapatos">
                </div>
                
                <div class="carousel-item">
                    <img src="imagenes/zapatos3.jpg" class="d-block w-100" alt="fotos de zapatos">
                </div>

            </div>
            
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
                
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
       
       

    </div>
    </div>

    <footer class="texto bg-dark text-light p-1 mt-2 d-flex justify-content-between">
        <p><a class="nav-link active text-center text-light h5" aria-current="page" href="config/sesion.php">Salir</a></p>
        <p>Empleado conectado: <span> <?php echo $_SESSION["nombre"]; ?> </span> </p>
    </footer>


    
    <script src="js/bootstrap.bundle.js"></script>
    <script src="https://kit.fontawesome.com/e954e6d43f.js" crossorigin="anonymous"></script>
</body>

</html>

    
    <script src="js/bootstrap.bundle.js"></script>
</body> 

</html>

<?php
    }
?>    