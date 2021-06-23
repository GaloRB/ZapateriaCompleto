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
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ballet&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../imagenes/Icono.png">
    <title>Ingresos | Declean Glamoure</title>
</head>
<body>
<h1 class="text-center m-3">Declean Glamoure</h1>
<nav class="navbar navbar-expand-lg navbar-light bg-light bg-dark border border-danger img-fluid">
    </nav>
    <button type="button" class="btn btn-dark m-2"><a href="../home.php" class="badge badge-dark">Regresar</a></button>
    <div class="container-fluid mt-5 w-75">
    

<h2>Ingresos</h2>
    <!-- <form method="POST" action="">
        <div class="input-group date w-25" data-provide="datepicker">
            <input type="date" class="form-control">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
        </div>
        <button type="submit" name="fecha" class="btn btn-dark m-2">Consultar</button>
    </form> -->

        <table class="table table-striped table-hover">
             <thead>
                <tr>
                    <th scope="col">Id_factura</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Id_producto</th>
                    <th scope="col">unidades</th>
                    <th scope="col">Total</th> 
                    
                                                    
                </tr>
            </thead>
            <tbody>
                            
             <?php


               $sql="SELECT * from factura" ;
               $result=mysqli_query($conn,$sql);  
               
                while($row=mysqli_fetch_array($result)){
                                     
                echo'<tr> 
                     <td>'.$row['Id_factura'].'</td>
                     <td>'.$row['fecha'].'</td>
                     <td>'.$row['Id_producto'].'</td>
                     <td>'.$row['unidades'].'</td>
                     <td>'.$row['total'].'</td>
                     
                                                                      
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