<?php
require ('../config/conection.php');

    session_start();
    if(!isset($_SESSION["autenticado"])){
        header("Location:../index.php");
        
    }else{
  // include('config/conection.php');

// if(isset($_POST['vienedelform'])){
//     $codigo = $_POST['vienedelform'];
//     $unidades = $_POST['vienedelform2'];
//     echo $codigo;
//     echo $unidades;
// }else{
//     echo 'nooo';
// } 


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
    <title>Devolución | Declean Glamoure</title>
</head>
<body>
<h1 class="text-center m-3">Declean Glamoure</h1>
<nav class="navbar navbar-expand-lg navbar-light bg-light bg-dark border border-danger img-fluid">
    </nav>
    <button type="button" class="btn btn-dark m-2"><a href="../ventas.php" class="badge badge-dark">Regresar</a></button>
    <div class="container-fluid mt-2 w-75">
    
        <h2 class='text-center'>Devolución Exitosa</h2>
    </div>

    <div class="container-fluid mt-5 w-75">
    

                                
                 <?php
                 if(isset($_POST['vienedelform'])){
                        $codigo = $_POST['vienedelform'];
                        $unidades = $_POST['vienedelform2'];
                        $id_factura = $_POST['vienedelform3'];
                        $query ="SELECT * from productos WHERE Id = '$codigo'";
                        $result=mysqli_query($conn,$query);  
                         while($row=mysqli_fetch_array($result)){
                             $stock = $row['Stock'];
                         }
                        $query2 = "UPDATE productos SET Stock = $stock + $unidades WHERE Id = '$codigo'";
                        $res2 = mysqli_query($conn,$query2);
                        
                }
                   $sql="SELECT * from productos WHERE Id = '$codigo'";
                   $result=mysqli_query($conn,$sql);  
                    while($row=mysqli_fetch_array($result)){
                                        
                    

                    echo '<h2 class="mt-5">La factura con codigo '.$id_factura.' quedo fuera del sistema y ahora el producto <strong><em>'.$row['Producto'].'</em></strong> marca <strong><em>'.$row['Marca'].'</em></strong> cuenta con un stock actual de <strong><em>'.$row['Stock'].'</em></strong></h2>';
                     }   
                     
                     $sql2="DELETE FROM factura WHERE Id_factura = '$id_factura'";
                     $result2=mysqli_query($conn,$sql2);
                ?>                           
               
        </div>
            
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