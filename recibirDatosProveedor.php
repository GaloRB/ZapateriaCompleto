<?php


function consultarProveedor(){
    include('config/conection.php');

    $proveedor = $_POST['proveedor'];

    $query = "SELECT * from proveedor WHERE Nombre = '$proveedor'";
    $result = mysqli_query($conn,$query);
    while($row=mysqli_fetch_all($result)){
        echo json_encode($row);
     }

}



if(isset($_POST['proveedor'])){
    consultarProveedor();
}


?>