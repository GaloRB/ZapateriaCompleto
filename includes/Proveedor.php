<?php

    function agregarProveedor(){
        include_once '../config/conection.php';
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $CodigoP = $_POST['CodigoP'];
            echo "0";
            $sql="INSERT INTO proveedor (Nombre,telefono,CodigoP) VALUES ('$nombre','$telefono','$CodigoP')";
            $result=mysqli_query($conn,$sql);
            if($result){
                echo "1";
               header("Location:editproveedores.php");
            }else{
                echo "Error";
            }
    }

    function eliminarProveedor(){
        include_once '../config/conection.php';
        $id = $_POST['id'];
        $sql= "SELECT Id FROM proveedor WHERE Id = '$id'";
        $result = mysqli_query($conn,$sql);
        if($result){
            $query= "DELETE FROM proveedor WHERE Id = '$id'";
            $res = mysqli_query($conn,$query);
            header("Location:editproveedores.php");
        }
    }

    

    if(isset($_POST['eliminar'])){
        eliminarProveedor();
    }
   

    if(isset($_POST['guardar'])){
    
        agregarProveedor();
    }



?>