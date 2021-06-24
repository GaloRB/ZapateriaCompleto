<?php
function consultarMarca(){
    include('config/conection.php');

    $Marca = $_POST['marca'];

    $query = "SELECT * FROM productos WHERE Marca = '$Marca'";
    $result = mysqli_query($conn,$query);
    while($row=mysqli_fetch_all($result)){
        echo json_encode($row);
     }

}


if(isset($_POST['marca'])){
    consultarMarca();
}

?>