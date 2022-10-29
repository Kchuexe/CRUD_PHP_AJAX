<?php
include "../modelo/conexion.php";

$eliminar_Id = $_POST['Eli_ID'];
$query = "delete from uf where ID='$eliminar_Id' ";
$resultado = mysqli_query($conexion,$query);

if($resultado)
{
    echo ' <div class="alert alert-success">Eliminado con exito</div>';
}
else
{
    echo ' <div class="alert alert-danger">Error al eliminar</div>';
}

?>