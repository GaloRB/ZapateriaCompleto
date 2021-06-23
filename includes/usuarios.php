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
    <title>Disponibles | Declean Glamoure</title>
</head>
<body>
<h1 class="text-center m-3">Declean Glamoure</h1>
<nav class="navbar navbar-expand-lg navbar-light bg-light bg-dark border border-danger img-fluid">
    </nav>
    <button type="button" class="btn btn-dark m-2"><a href="../inventario.php" class="badge badge-dark">Regresar</a></button>
    <div class="container-fluid mt-5 w-50">
    
    
    <div class="d-flex justify-content-evenly">
    <button type="button" class="btn btn-dark m-2"><a href="registrarUsuario.php" class="badge badge-dark">Agregar Usuario</a></button>
    <button type="button" class="btn btn-dark m-2"><a href="eliminarUsuario.php" class="badge badge-dark">Eliminar Usuario</a></button>
   
   </div>    
<h2>Usuarios actuales</h2>
        <table class="table table-striped table-hover">
             <thead>
                <tr>
                    <th scope="col">Clave</th>
                    <th scope="col">Nombre</th>
                    <th scope="col ">Tipo de usuario</th>
                    
                                                    
                </tr>
            </thead>
            <tbody>
                            
             <?php
               $sql="SELECT * from alumnos";
               $result=mysqli_query($conn,$sql);  
                while($row=mysqli_fetch_array($result)){
                       if($row['tipoUsuario'] == 1){
                        $row['tipoUsuario'] = 'Administrador';
                       }else{
                        $row['tipoUsuario'] = "Usuario";
                       }             
                echo'<tr> 
                     <td>'.$row['Id'].'</td>
                     <td>'.$row['Nombre'].'</td>
                     <td class="text-center">'.$row['tipoUsuario'].'</td>
                     
                                                                      
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