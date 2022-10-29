<?php
include "../modelo/conexion.php";
$id=$_GET["id"];
$sql=$conexion->query("selec * from uf where id=");
while($datos=$sql->fetch_object()){

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<form class="col-4 p-3 m-auto" method="POST">
            <h3 class="text-center text-secondary">Registro UF</h3>
            <?php
            include "modelo/conexion.php";
            include "controlador/registro.php";
            ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Codigo</label>
                <input type="text" class="form-control" name="codigo">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Unidadmedida</label>
                <input type="text" class="form-control" name="unidad">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Valor</label>
                <input type="text" class="form-control" name="valor">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha</label>
                <input type="date" class="form-control" name="fecha">
            </div>
            <button type="submit" class="btn btn-primary" name="btnGuardar" value="ok">Guardar</button>
        </form>
</body>
</html>