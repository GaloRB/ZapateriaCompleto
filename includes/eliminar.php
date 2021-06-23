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
    <link rel="shortcut icon" href="../imagenes/Icono.png">
    <link href="https://fonts.googleapis.com/css2?family=Ballet&display=swap" rel="stylesheet">

    <title>Eliminar Producto | Declean Glamoure</title>
</head>
<body>

<!-------------- Eliminar Producto------------ -->
<h1 class="text-center m-3">Declean Glamoure</h1>
<nav class="navbar navbar-expand-lg navbar-light bg-light bg-dark border border-danger img-fluid">
    </nav>
<button type="button" class="btn btn-dark m-2"><a href="../inventario.php" class="badge badge-dark">Regresar</a></button>
<h2 class="text-center">Eliminar producto</h2>        
       
       <!-- Button trigger modal -->
       <div class="d-flex justify-content-evenly">
    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      Eliminar Producto
    </button>
    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Eliminar De Producto Existente
    </button>
   
 </div>




<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Eliminar Producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="Producto.php" method="POST">
        
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="inputPassword6" class="col-form-label">Id de Producto</label>
                </div>
                <div class="col-auto">
                    <input type="number" name="id" min="1" pattern="^[0-9]+" required placeholder="Id de producto..." id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                </div>
                <div class="col-auto">
                    <span id="passwordHelpInline" class="form-text">
                    Ingresa el Id del producto que desea eliminar
                    </span>
                </div>
            </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" name="eliminar">Eliminar</button>
        </div>

       </form>



    </div>
  </div>
</div>

<!-- ---------------- Eliminar Producto Existente-------------------------- -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar de un producto existente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="Producto.php" method="POST">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Clave De Producto</label>
            <div id="emailHelp" class="form-text">Ingresa la clave del producto al que deseas descontar unidades de stock.</div>
            <input type="number" name="clave" min="1" pattern="^[0-9]+" class="form-control" placeholder="Clave del producto existente..." required aria-describedby="emailHelp">
           
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">¿Cuantas unidades descontaras al sotck?</label>
            <input type="number" name="unidades" min="1" pattern="^[0-9]+" required class="form-control" id="exampleInputPassword1">
          </div>
         
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" name="eliminarExistente" class="btn btn-primary">Eliminar</button>
          </div>
      </form>
      </div>
      
    </div>
  </div>
</div>



<div class="container-fluid mt-5 w-75">

<h2>Productos disponibles</h2>
        <table class="table table-striped table-hover">
             <thead>
                <tr>
                    <th scope="col">Clave</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Talla</th> 
                    <th scope="col">Proveedor</th> 
                    <th scope="col">Precio</th> 
                                                    
                </tr>
            </thead>
            <tbody>
                            
             <?php
               $sql="SELECT * from productos WHERE Stock > 0";
               $result=mysqli_query($conn,$sql);  
                while($row=mysqli_fetch_array($result)){
                                    
                echo'<tr> 
                     <td>'.$row['Id'].'</td>
                     <td>'.$row['Producto'].'</td>
                     <td>'.$row['Marca'].'</td>
                     <td>'.$row['Stock'].'</td>
                     <td>'.$row['Talla'].'</td>
                     <td>'.$row['Proveedor'].'</td>
                     <td> $'.$row['Precio'].'</td>
                                                                      
                     </tr>';
                 }                          
            ?>                           
            </tbody>
        </table>
</div>
    
  <footer class="texto bg-dark text-light p-3 mt-5 d-flex justify-content-between">
        <p><a class="nav-link active text-center text-light h5" aria-current="page" href="../config/sesion.php">Salir</a></p>
        <p>Empleado conectado: <span> <?php echo $_SESSION["nombre"]; ?> </span> </p>
    </footer>
    
         
         
         <script src="../js/bootstrap.bundle.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>
</html>

<?php
    }
?>