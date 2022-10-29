<?php
include "../modelo/conexion.php";
$ID = $_POST['UID'];
        $query = "select * from uf where ID='$ID'";
        $result = mysqli_query($conexion,$query);

        while($row=mysqli_fetch_assoc($result))
        {
            $Resultado = [];
            $Resultado[0]=$row['ID'];
            $Resultado[1]=$row['NOMBRE'];
            $Resultado[2]=$row['CODIGO'];
            $Resultado[3]=$row['UNIDAD'];
            $Resultado[4]=$row['VALOR'];
            $Resultado[5]=$row['FECHA'];
            $Resultado[6]=$row['TIEMPO'];
            $Resultado[7]=$row['ORIGEN'];
        }
        //print_r($Resultado);
        echo json_encode($Resultado);
?>