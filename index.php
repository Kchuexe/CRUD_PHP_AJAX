<!DOCTYPE html>
<html lang="es-CL">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css" />
    <title>Tarea de Desarrollo PHP</title>
</head>

<body>
<h1 class="text-center p-3">CRUD PHP + AJAX</h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-title ml-5 my-2">
                        <!--Boton de registro-->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registro">Agregar Registro</button>
                    </div>
                    <div class="card-body">
                        <p id="eli_mensaje" class="text-dark"></p>
                        <div id="table">
                         <table class="table table-hover table-bordered table-striped" id="tabla">
                    <thead class="bg-info">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">CÓDIGO</th>
                            <th scope="col">UNIDAD</th>
                            <th scope="col">VALOR</th>
                            <th scope="col">FECHA</th>
                            <th scope="col">TIEMPO</th>
                            <th scope="col">ORIGEN</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>     
                </table> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="registro">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="text-dark">Formulario de Registro</h3>
                </div>
                <div class="modal-body">
                    <p id="mensaje" class="text-dark"></p>
                    <form>
                        <input type="text" class="form-control my-2" placeholder="Nombre" id="nombre">
                        <input type="text" class="form-control my-2" placeholder="Código" id="codigo">
                        <input type="text" class="form-control my-2" placeholder="Unidad" id="unidad">
                        <input type="text" class="form-control my-2" placeholder="Valor" id="valor">
                        <input type="date" class="form-control my-2" placeholder="Fecha" id="fecha">
                        <input type="text" class="form-control my-2" placeholder="Origen" id="origen">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="btn_registro">Guardar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btn_cancelar">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="actualizar">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="text-dark">Formulario de Actualizar</h3>
                </div>
                <div class="modal-body">
                    <p id="up_mensaje" class="text-dark"></p>
                    <form>
                        <input type="hidden" class="form-control my-2" placeholder="id" id="Up_ID">
                        <input type="text" class="form-control my-2" placeholder="Nombre" id="up_nombre">
                        <input type="text" class="form-control my-2" placeholder="Código" id="up_codigo">
                        <input type="text" class="form-control my-2" placeholder="Unidad" id="up_unidad">
                        <input type="text" class="form-control my-2" placeholder="Valor" id="up_valor">
                        <input type="date" class="form-control my-2" placeholder="Fecha" id="up_fecha">
                        <input type="text" class="form-control my-2" placeholder="Origen" id="up_origen">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="btn_actualizar">Actualizar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btn_close">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="eliminar">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="text-dark">Eliminar Registro</h3>
                </div>
                <div class="modal-body">
                    <p>¿Desea eliminar el registro?</p>
                    <button type="button" class="btn btn-success" id="btn_eliminar_registro">Eliminar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btn_close">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="js/script.js"></script>
    
</body>

</html>