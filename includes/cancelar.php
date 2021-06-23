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

    <!-- Formulario para factura -->
    <div  class="container-fluid mt-5 w-50">

    
    <?php

        $codigo = $_POST['codigo'];

        $consulta = "SELECT * FROM factura WHERE Id_factura = $codigo";
        $res = mysqli_query($conn,$consulta);
        while($fila=mysqli_fetch_array($res)){
            $Id_factura = $fila['Id_factura'];
        }
        if(!isset($Id_factura)){
            echo '<h2 class="mt-5">La factura con el codgio '.$codigo.' no existe o a sido sacada del sistema con aterioridad</h2>';
                     
        }else{
            echo '<h2>Contenido de factura</h2>
            <table class="table table-striped table-hover">
                 <thead>
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Clave de producto</th>
                        <th scope="col">Unidades</th>
                        <th scope="col">Costo</th> 
                        
                                                        
                    </tr>
                </thead>
                <tbody>';
                                
                 
                 
                     $codigo = $_POST['codigo'];
                     
                 
                   $sql="SELECT factura.Id_factura, factura.fecha, factura.Id_producto, factura.unidades, productos.Precio  FROM factura INNER JOIN productos on factura.Id_producto = productos.Id WHERE Id_factura = '$codigo'";
                   $result=mysqli_query($conn,$sql);  
                   
                    while($row=mysqli_fetch_array($result)){
                        //  variables para mandar a la devolucion
                        $producto = $row['Id_producto']; 
                        $unidades =  $row['unidades'];          
                        echo'<tr> 
                                
                             <td id="tr">'.$row['Id_factura'].'</td>
                             <td>'.$row['fecha'].'</td>
                             <td>'.$row['Id_producto'].'</td>
                             <td>'.$row['unidades'].'</td>
                             <td> $'.$row['Precio']*$row['unidades'].'</td>
                                                                              
                             </tr>';
                         }  
                  
                     
                                          
                                      
               echo '</tbody>
            </table>
            <div class="d-flex justify-content-center mt-3">
            <form method="POST" action="devolucion.php">

                <input type="hidden" name="vienedelform" id="producto" value="'.$producto.'">
                <input type="hidden" name="vienedelform2" id="unidades" value= "'.$unidades.'">
                <input type="hidden" name="vienedelform3" id="unidades" value= "'.$codigo.'">

                <button  type="submit" id="cancelarVenta" name="cancelarVenta" class="btn btn-primary">Cancelar venta</button>
            </form>
                
            </div>';
        }
    ?>
    

    
        
        
            
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