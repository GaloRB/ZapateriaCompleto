<?php
require ('../config/conection.php');
$proveedor = $_GET['proveedor'];
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
    <title>Proveedores | Declean Glamoure</title>
</head>
<body>
<h1 class="text-center m-3">Declean Glamoure</h1>
<nav class="navbar navbar-expand-lg navbar-light bg-light bg-dark border border-danger img-fluid">
    </nav>
    <button type="button" class="btn btn-dark m-2"><a href="../inventario.php" class="badge badge-dark">Regresar</a></button>
    <div class="container-fluid mt-5 w-75">
    

    <div class="tex-center d-flex justify-content-around">
        <h2>Proveedores</h2>
        <button type="button" class="btn btn-dark m-2 fs-3"><a href="../vozProveedor.php" class="badge badge-dark">Buscar con voz</a></button>
    </div>
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
               $sql="SELECT * from proveedor WHERE Nombre = '$proveedor'";
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

<footer class="texto bg-dark text-light p-1 mt-3 d-flex justify-content-between">
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