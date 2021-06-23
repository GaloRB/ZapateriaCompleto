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

    <title>Editar Proveedor | Declean Glamoure</title>
</head>
<body>


<h1 class="text-center m-3">Declean Glamoure</h1>
<nav class="navbar navbar-expand-lg navbar-light bg-light bg-dark border border-danger img-fluid">
    </nav>
<button type="button" class="btn btn-dark m-2"><a href="../inventario.php" class="badge badge-dark">Regresar</a></button>      
<!-- Button trigger modal -->
  <div class="d-flex justify-content-evenly">
    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
      Agregar Proveedor
    </button>

    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      Eliminar Proveedor
    </button>
  </div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Agregar Proveedor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      
<form action="Proveedor.php" method="POST">

          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Nombre</span>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre del proveedor" required aria-label="Username" aria-describedby="basic-addon">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text">Telefono:</span>
            <input type="number" name="telefono" min="0" pattern="^[0-9]+" required class="form-control" placeholder="telefono" aria-label="Username">
            <span class="input-group-text">Codigo Postal:</span>
            <input type="number" name="CodigoP" min="0" pattern="^[0-9]+" required class="form-control" placeholder="CodigoP" aria-label="Username">
          </div>
          
        </div>  
        
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" name="guardar" class="btn btn-primary">Agregar</button>
      </div>
    </div>
  </div>
</div>        
</form>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Eliminar Proveedor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="Proveedor.php" method="POST">
        
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="inputPassword6" class="col-form-label">Clave de Proveedor</label>
                </div>
                <div class="col-auto">
                    <input type="number" name="id" min="1" pattern="^[0-9]+" required placeholder="Clave Proveedor..." id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
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


<div class="container-fluid mt-5 w-75">

<h2>Proveedores Activos</h2>
        <table class="table table-striped table-hover">
             <thead>
                <tr>
                    <th scope="col">Clave Proveedor</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Codigo Postal</th>                                
                </tr>
            </thead>
            <tbody>
                            
             <?php
               $sql="SELECT * from proveedor";
               $result=mysqli_query($conn,$sql);  
                while($row=mysqli_fetch_array($result)){
                                    
                echo'<tr> 
                     <td>'.$row['Id'].'</td>
                     <td>'.$row['Nombre'].'</td>
                     <td>'.$row['Telefono'].'</td>
                     <td>'.$row['CodigoP'].'</td>                                             
                     </tr>';
                 }                          
            ?>                           
            </tbody>
        </table>
</div>
    
  <footer class="texto bg-dark text-light p-1 mt-2 d-flex justify-content-between">
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