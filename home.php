<?php
    require_once ('includes/head.php');
?>

<body>
    <h1 class="text-center m-3">Declean Glamoure</h1>
    <nav class="navbar navbar-expand-lg navbar-light bg-light bg-dark border border-danger img-fluid">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
                
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item px-5">
                        <a class="nav-link active text-center text-light h5" aria-current="page" href="ventas.php">
                            <img src="imagenes/shop.ico">Ventas</a>
                    </li>

                    <li class="nav-item px-5">
                        <a class="nav-link text-light h5" href="inventario.php">
                            <img src="imagenes/inventario1.ico"> Inventario</a>
                    </li>
                        
                    <li class="nav-item px-5">
                        <a class="nav-link text-light h5" href="includes/tablaingresos.php">
                            <img src="imagenes/ingresos.ico"> Ingresos</a>
                    </li>

                    <li class="nav-item px-5">
                        <a class="nav-link active text-center text-light h5" href="includes/usuarios.php">
                          <img src="imagenes/inventario1.ico"> Control de Usuarios</a>
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
<?php
require_once ('includes/footer.php');
?>

