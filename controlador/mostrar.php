<?php
include "../modelo/conexion.php";
$draw = $_POST['draw'];
$row = $_POST['start'];
$filaPorPagona = $_POST['length']; // visualización de filas por página
$indiceColumna = $_POST['order'][0]['column']; // index de columas
$nombreColumna = $_POST['columns'][$indiceColumna]['data']; // nombre de columna
$ordenClasifiColumna = $_POST['order'][0]['dir']; // ascendente o descendente
$buscarValor = mysqli_real_escape_string($conexion,$_POST['search']['value']); // buscar un valor

## buscar 
$queryBuscar = " ";
if($buscarValor != ''){
   $queryBuscar = " and (NOMBRE like '%".$buscarValor."%' or 
   CODIGO like '%".$buscarValor."%' or 
   UNIDAD like'%".$buscarValor."%' ) ";
}

## número total de registros sin filtrar
$sel = mysqli_query($conexion,"select count(*) as allcount from uf");
$registros = mysqli_fetch_assoc($sel);
$totalRegistros = $registros['allcount'];

## número total de registro con filtrado
$sel = mysqli_query($conexion,"select count(*) as allcount from uf WHERE 1 ".$queryBuscar);
$registros = mysqli_fetch_assoc($sel);
$totalRegistrosConFiltro = $registros['allcount'];

## obtener registros
$empQuery = "select * from uf WHERE 1 ".$queryBuscar." order by ".$nombreColumna." ".$ordenClasifiColumna." limit ".$row.",".$filaPorPagona;
$empRegistro = mysqli_query($conexion, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRegistro)) {
   $data[] = array(
      "ID"=>$row['ID'],
      "NOMBRE"=>$row['NOMBRE'],
      "CODIGO"=>$row['CODIGO'],
      "UNIDAD"=>$row['UNIDAD'],
      "VALOR"=>$row['VALOR'],
      "FECHA"=>$row['FECHA'],
      "TIEMPO"=>$row['TIEMPO'],
      "ORIGEN"=>$row['ORIGEN'],
      "Editar"=>'<button class="btn btn-success" id="btn_editar" data-id="'.$row['ID'].'"><i class="bi bi-pen"></i></button>',
      "Eliminar"=>'<button class="btn btn-danger" id="btn_eliminar" data-id1='.$row['ID'].'><i class="bi bi-trash"></i></button>'
   );
}

$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRegistros,
  "iTotalDisplayRecords" => $totalRegistrosConFiltro,
  "aaData" => $data
);
echo json_encode($response);
?>