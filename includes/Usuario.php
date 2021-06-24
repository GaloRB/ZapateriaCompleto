<?php

    function agregarUsuario(){
        include_once '../config/conection.php';
        $nombre = $_POST['nombre'];
        $password = $_POST['password'];
        $tipoUsuario = $_POST["tipoUsuario"];

        
        
        $sql="INSERT INTO alumnos (Nombre,Contraseña,tipoUsuario) VALUES ('$nombre','$password','$tipoUsuario')";
        $result=mysqli_query($conn,$sql);
        if($result){
            header("Location:usuarios.php"); 
          echo "guardado";
        }else{
            echo "Error";
        }
    }


    
function registrarUsuario(){
    include_once '../config/conection.php';

    
        $nombre = $_POST['nombre'];
        $password = $_POST['password'];
        $TipoU = $_POST['tipoUsuario'];
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        if(buscarUsuarioRepetido($nombre,$conn) == 1){
            echo json_encode(array('data'=> 2));
        }else{
            $sql="INSERT INTO alumnos (Nombre,Contraseña,tipoUsuario) VALUES ('$nombre','$password','$TipoU')";
            $result=mysqli_query($conn,$sql);
            
        
            if($result){
                echo json_encode(array('data'=> 1));
                
            }else{
              echo json_encode(array('data'=> $result));
            }
        }
        
       
}

function buscarUsuarioRepetido($nom,$conn){

    $query ="SELECT * FROM alumnos WHERE Nombre = '$nom'";
    $resultado =mysqli_query($conn,$query);

    if(mysqli_num_rows($resultado) > 0){
        return 1;
    }else{
        return 0;
    }

}



    // function eliminarUsuario(){
    //     include_once '../config/conection.php';
    //     $clave = $_POST['clave'];
    //     $sql= "SELECT Id FROM alumnos WHERE Id = '$clave'";
    //     $result = mysqli_query($conn,$sql);
    //     if($result){
    //         $query= "DELETE FROM alumnos WHERE Id = '$clave'";
    //         $res = mysqli_query($conn,$query);
    //         header("Location:usuarios.php");
    //     }
    // }

    function eliminarUsuario(){
        include_once '../config/conection.php';
    
        
        $usuario = $_POST['usuario'];
        
            $sql="DELETE FROM alumnos WHERE Id = '$usuario'";
            $result=mysqli_query($conn,$sql);
            
        
            if(($result)){
                echo json_encode(array('data'=> 1));
                
            }else{
              echo json_encode(array('data'=> 0));
            }
        
    }

   

    

    // if(isset($_POST['eliminar'])){
    //     eliminarUsuario();
    // }

    if(isset($_POST['usuario']) && !empty($_POST['usuario'])){
        eliminarUsuario();
    }
   

    if(isset($_POST['nombre']) && isset($_POST['password'])){
        registrarUsuario();
    }


?>