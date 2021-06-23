<?php
    session_start();
    if(!isset($_SESSION["autenticado"]) || !isset($_SESSION['usuario'])){
        header("Location:../index.php");
    }else{
        if(isset($_SESSION["autenticado"])){
            header("Location:../home.php");
        }else if($_SESSION["usuario"]){
            header("Location:../inventarioUsuario.php");
        }
    }
?>