<?php
include "../modelo/conexion.php";

    if(!empty($_POST["UNombre"]) and !empty($_POST["UCodigo"]) and !empty($_POST["UUnidad"]) and !empty($_POST["UValor"]) and !empty($_POST["UFecha"])){
        $nombre=$_POST["UNombre"];
        $codigo=$_POST["UCodigo"];
        $unidad=$_POST["UUnidad"];
        $valor=$_POST["UValor"];
        $fecha=$_POST["UFecha"];
        $origen=$_POST["UOrigen"];
        $sql=$conexion->query("insert into uf values(NULL,'$nombre','$codigo','$unidad',$valor,'$fecha', NULL, '$origen')");
        if($sql==1){
            //echo 'Registro guardado';
            echo '<div class="alert alert-success"> Registro guardado</div>';
        }else{
            //echo mysqli_error($conexion);
            echo '<div class="alert alert-danger"> Error</div>';
        }
    }else{
        echo '<div class="alert alert-warning"> Los campos no pueden estar vacios</div>';
    }
// if (!empty($_POST["btnGuardar"])){
?>