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
    
    <title>Registrar Usuario | Declean Glamoure</title>
</head>
<body>

<!-------------- Agregar Producto Nuevo------------ -->
<h1 class="text-center m-3">Declean Glamoure</h1>
         <nav class="navbar navbar-expand-lg navbar-light bg-light bg-dark border border-danger img-fluid">
    </nav>
    <button type="button" class="btn btn-dark m-2"><a href="../inventario.php" class="badge badge-dark">Regresar</a></button>
         <h2 class="text-center m-3"> Registrar usuario </h2> 


         <form class="container-fluid mt-5 w-25" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre de usuario:</label>
                        <input type="text" reuired name="nombre" id="nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Escribe el nombre del nuevo usuario...">
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password:</label>
                        <input type="password" reuired name="password" id="password" class="form-control" id="exampleInputPassword1" placeholder="Escribe su contraseña">
                    </div>

                    <label for="tipoUsuario">Tipo de usuario:</label>
                    <select class="form-select mt-2" reuired name="tipoUsuario" id="tipoUsuario" aria-label="Default select example">
                        <option value="2">Selecciona un tipo de usuario...</option>
                        <option value="0">Usuario</option>
                        <option value="1">Administrador</option>
                    </select>
                    
                    <button type="submit" name="registrar" id="registrar" class="btn btn-primary mt-3">Registrar</button>
                    <!-- Div de alerta en casi de datos incorrectos -->
                    <div class="mt-2 invisible none" id="answer">
                        <div id="alertForm" class="alert alert-danger text-center" role="alert">

                        </div>
                    </div>
            </form>



         <footer class="texto bg-dark text-light p-3 mt-5 d-flex justify-content-between">
        <p><a class="nav-link active text-center text-light h5" aria-current="page" href="../config/sesion.php">Salir</a></p>
        <p>Empleado conectado: <span> <?php echo $_SESSION["nombre"]; ?> </span> </p>
    </footer>

   
         
         <script src="../js/bootstrap.bundle.js"></script>
         <script src="../js/scriptsRegistrarUsuario.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
         
</body>
</html>

<?php
    }
?>         