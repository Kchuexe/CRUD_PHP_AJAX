<?php
include "../modelo/conexion.php";
$Up_ID = $_POST['U_ID'];
        $upnombre = $_POST['U_nombre'];
        $upcodigo = $_POST['U_codigo'];
        $upunidad = $_POST['U_unidad'];
        $upvalor = $_POST['U_valor'];
        $upfecha = $_POST['U_fecha'];
        $uporigen = $_POST['U_origen'];

        $query = "update uf set NOMBRE='$upnombre', CODIGO='$upcodigo', UNIDAD='$upunidad', VALOR='$upvalor', FECHA='$upfecha', ORIGEN='$uporigen' WHERE ID='$Up_ID'";
        $result = mysqli_query($conexion,$query);
        if($result)
        {
            echo '<div class="alert alert-success"> Registro actualizado</div>';
        }
        else
        {
            echo '<div class="alert alert-danger"> Error</div>';
        }
?>