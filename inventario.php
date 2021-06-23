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
                    <a class="nav-link active text-center text-light h5" aria-current="page" href="home.php">
                    <img src="imagenes/inicio1.ico"> Home </a>
                  </li>

                    <br>

                  <li class="nav-item px-5">
                    <a class="nav-link active text-center text-light h5" aria-current="page" href="ventas.php">
                      <img src="imagenes/shop.ico"> Ventas</a>
                  </li>
                    
                    <br>

                  
                  <li class="nav-item px-5">
                      <a class="nav-link active text-center text-light h5" href="includes/tablaingresos.php">
                        <img src="imagenes/ingresos.ico"> Ingresos</a>
                  </li>
              </ul>
            </div>
        </div>
    </nav>

    <h2 class="text-center m-4"> Inventario de articulos </h2>
        <div class="bg-dark w-50 my-0 mx-auto">
          <ul class="nav flex-column">
            <li class="nav-item">
                  <div class="" >
                            <li><a class="dropdown-item text-center text-light h5 p-2" href="includes/disponibles.php">Consultar disponibles</a></li>
                            <li><a class="dropdown-item text-center text-light h5 p-2" href="includes/agotados.php">Consultar agotados</a></li>
                            <li><a class="dropdown-item text-center text-light h5 p-2" href="includes/agregar.php">Agregar producto</a></li>
                            <li><a class="dropdown-item text-center text-light h5 p-2" href="includes/eliminar.php">Eliminar de producto</a></li>
                            <li><a class="dropdown-item text-center text-light h5 p-2" href="includes/proveedores.php">Consultar proveedores</a></li>
                            <li><a class="dropdown-item text-center text-light h5 p-2" href="includes/editproveedores.php">Editar proveedores</a></li>
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
