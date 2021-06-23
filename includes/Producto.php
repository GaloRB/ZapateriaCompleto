<?php

    function agregarProducto(){
        include_once '../config/conection.php';
            $producto = $_POST['producto'];
            $precio = $_POST['precio'];
            $unidades = $_POST['unidades'];
            $marca = $_POST['marca'];
            $talla = $_POST['talla'];
            $proveedor = $_POST['proveedor'];
            
            $sql="INSERT INTO productos (Producto,Stock,Marca,Talla,Proveedor,Precio) VALUES ('$producto','$unidades','$marca','$talla','$proveedor','$precio')";
            $result=mysqli_query($conn,$sql);
            if($result){
               
               header("Location:agregar.php");
            }else{
                echo "Error";
            }
    }

    function agregarExistente(){
        include_once '../config/conection.php';
        $clave = $_POST['clave'];
        $unidades = $_POST['unidades'];
        $sql= "SELECT * FROM productos WHERE Id = '$clave'";
        $result = mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($result)){
            $stock = $row['Stock'];
        }
        
        
        if($result){
            
           $query= "UPDATE productos SET Stock = '$stock' + '$unidades' WHERE Id = '$clave'";
            $res = mysqli_query($conn,$query);
            header("Location:agregar.php");
        }
    }

    function eliminarProdructo(){
        include_once '../config/conection.php';
        $id = $_POST['id'];
        $sql= "SELECT Id FROM productos WHERE Id = '$id'";
        $result = mysqli_query($conn,$sql);
        if($result){
            $query= "DELETE FROM productos WHERE Id = '$id'";
            $res = mysqli_query($conn,$query);
            header("Location:eliminar.php");
        }
    }

   
    
    function eliminarExistente(){
        include_once '../config/conection.php';
        $clave = $_POST['clave'];
        $unidades = $_POST['unidades'];
        $sql= "SELECT * FROM productos WHERE Id = '$clave'";
        $result = mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($result)){
            $stock = $row['Stock'];
        }
        
        
        if($result){
            
           $query= "UPDATE productos SET Stock = '$stock' - '$unidades' WHERE Id = '$clave'";
            $res = mysqli_query($conn,$query);
            header("Location:eliminar.php");
        }
    }
    

    if(isset($_POST['eliminar'])){
        eliminarProdructo();
    }
   

    if(isset($_POST['guardar'])){
    
        agregarProducto();
    }

    if(isset($_POST['agregarExistente'])){
    
        agregarExistente();
    }

    if(isset($_POST['eliminarExistente'])){
    
        eliminarExistente();
    }


?>