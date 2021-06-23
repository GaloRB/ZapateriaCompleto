<?php


function generarVenta(){
    include('config/conection.php');
    
        $clave = $_POST['clave'];
        $unidades = $_POST['unidades'];
        $fecha_actual = date("Y-m-d");
        
        $query = "SELECT * FROM productos WHERE Id = '$clave'";
        $result = mysqli_query($conn,$query);
        while($row=mysqli_fetch_array($result)){
            $stock = $row['Stock'];
         }
         if($result){
                
            $query= "UPDATE productos SET Stock = '$stock' - '$unidades' WHERE Id = '$clave'";
            $res = mysqli_query($conn,$query);
           
            $sql= "INSERT INTO factura (fecha,Id_producto,unidades) VALUES ('$fecha_actual', '$clave', '$unidades')";
            $res2= mysqli_query($conn,$sql);

            $sql2 = "SELECT MAX(Id_factura) AS id FROM factura";
            $res4 = mysqli_query($conn,$sql2);
            while($row2=mysqli_fetch_array($res4)){
                $id = $row2['id'];
             }

             $sql3 ="SELECT productos.Precio FROM factura INNER JOIN productos on factura.Id_producto = productos.Id WHERE Id_factura = '$id'";
             $res5 = mysqli_query($conn,$sql3);
             while($row3=mysqli_fetch_array($res5)){
                 $precio = $row3['Precio'];
              }

             $sql4 = "UPDATE factura SET total = '$unidades' * '$precio' WHERE Id_factura = '$id'";
             $res6= mysqli_query($conn,$sql4);
            
             
             $query2 = "SELECT * FROM factura";
             $res3 = mysqli_query($conn,$query2);
             while($row=mysqli_fetch_array($res3)){
                $factura = $row['Id_factura'];
             }
             
             echo json_encode($factura);
         } 
    

}



if(isset($_POST['clave'])){
    generarVenta();
}



?>