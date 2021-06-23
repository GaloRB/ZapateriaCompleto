<?php


function validarUsuario(){
    include('config/conection.php');
    session_start();

    
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        
        $query = "SELECT * FROM alumnos WHERE nombre ='$usuario' AND contraseña='$password'";
        $result = mysqli_query($conn,$query);
        while($row=mysqli_fetch_array($result)){
           $rolUsuario = $row['tipoUsuario'];
        }
    
        if(mysqli_num_rows($result)>0){
            if($rolUsuario == 0){
                $_SESSION["usuario"]= true;
                $_SESSION["nombre"]= $usuario;
                echo json_encode(array('data'=> 2));;
            }else{
                $_SESSION["autenticado"]= true;
                $_SESSION["nombre"]= $usuario;
                echo json_encode(array('data'=> 1));
            }
            
        }else{
          echo json_encode(array('data'=> 0));
        }
}

function validarVenta(){
    include('config/conection.php');
    
        $clave = $_POST['clave'];
        $unidades = $_POST['unidades'];
        
        $query = "SELECT * FROM productos WHERE Id = '$clave'";
        $result = mysqli_query($conn,$query);
        while($row=mysqli_fetch_array($result)){
           $Precio = $row['Precio'];
           $stock = $row['Stock'];

        }
        if(!isset($stock) || $stock == 0){
            $msg = 'No hay stock de este articulo';
            echo json_encode($msg);
        }else{
            if( $stock < $unidades){
                $msg2 = 'No hay producto suficiente solo existen ' .$stock. ' en stock';
                echo json_encode($msg2); 
            }else{
                echo json_encode($Precio);
            }
            
        }      
}

function validarFactura(){
    include('config/conection.php');
    
        $codigo = $_POST['codigo'];
        
        
        $query = "SELECT * FROM factura WHERE Id_factura = '$codigo'";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_array($result)){
                $factura = $row['Id_factura'];
             } 
             
             echo json_encode($factura);
         
            }else{
            $msg = 'No hay factura con este codigo';
            echo json_encode($msg);
}
}



function consultarProducto(){
    include('config/conection.php');

    $producto = $_POST['producto'];

    $query = "SELECT * FROM productos WHERE Producto = '$producto'";
    $result = mysqli_query($conn,$query);
    while($row=mysqli_fetch_all($result)){
        echo json_encode($row);
     }

}


if(isset($_POST['producto'])){
    consultarProducto();
}







if(isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['password']) && !empty($_POST['password'])){
    validarUsuario();
}

if(isset($_POST['clave']) && !empty($_POST['clave']) && isset($_POST['unidades']) && !empty($_POST['unidades'])){
    validarVenta();
}

if(isset($_POST['codigo']) && !empty($_POST['codigo'])){
 validarFactura();
}






?>
