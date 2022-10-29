$(document).ready(function()
{
    insertar_registro();
    ver_registro();
    obtener_registro();
    actualizar_registro();
    eliminar_registro();
})


// insertar
function insertar_registro()
{
   $(document).on('click','#btn_registro',function()
   {
        var nombre = $('#nombre').val();
        var codigo = $('#codigo').val();
        var unidad= $('#unidad').val();
        var valor= $('#valor').val();
        var fecha= $('#fecha').val();
        var origen= $('#origen').val();

        if(nombre == "" || codigo=="" || unidad=="" || valor=="" || fecha=="" || origen=="")
        {
            $('#mensaje').html('<div class="alert alert-warning"> Los campos no pueden estar vacios</div>');
        }
        else
        {
            $.ajax(
                {
                    url : '../Tarea_Desarrollo/controlador/registro.php',
                    method: 'post',
                    data:{UNombre:nombre,UCodigo:codigo,UUnidad:unidad,UValor:valor,UFecha:fecha,UOrigen:origen},
                    success: function(data)
                    {
                        $('#mensaje').html(data);
                        $('#registro').modal('show');
                        $('form').trigger('reset');
                        $('#tabla').DataTable().ajax.reload();
                    }
                })
        }
        
   })

   $(document).on('click','#btn_cancelar',function()
   {
       $('form').trigger('reset');
       $('#mensaje').html('');
   })   
}

// Mostrar datos de la tabla
function ver_registro()
{
    // $.ajax(
    //     {
    //         url: '../Tarea_Desarrollo/controlador/mostrar.php',
    //         method: 'post',
    //         success: function(data)
    //         {
    //             data = $.parseJSON(data);
    //             if(data.status=='success')
    //             {
    //                 $('#table').html(data.html);
                    
    //             }
    //         }
    //     })
    $('#tabla').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'ajax': {
            'url':'../Tarea_Desarrollo/controlador/mostrar.php'
        },
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        'columns': [
           { data: 'ID' },
           { data: 'NOMBRE'},
           {data: 'CODIGO'},
           {data: 'UNIDAD'},
           {data: 'VALOR'},
           {data: 'FECHA'},
           {data: 'TIEMPO'},
           {data: 'ORIGEN'},
           {data: 'Editar'},
           {data: 'Eliminar'},
        ]
     });
}

//obtener un registro
function obtener_registro()
{
    $(document).on('click','#btn_editar',function()
    {
        var ID = $(this).attr('data-id');
        $.ajax(
            {
                url: '../Tarea_Desarrollo/controlador/obtener_Dato.php',
                method: 'post',
                data:{UID:ID},
                dataType: 'JSON',
                success: function(data)
                {
                   $('#Up_ID').val(data[0]);
                   $('#up_nombre').val(data[1]);
                   $('#up_codigo').val(data[2]);
                   $('#up_unidad').val(data[3]);
                   $('#up_valor').val(data[4]);
                   $('#up_fecha').val(data[5]);
                   $('#up_origen').val(data[7]);
                   $('#actualizar').modal('show');
                   //console.log(data[1]);
                }
                
            })
    })
}

// Update Record 
function actualizar_registro()
{
    
    $(document).on('click','#btn_actualizar',function()
    {
        var UpID = $('#Up_ID').val();
        var upnombre = $('#up_nombre').val();
        var upcodigo = $('#up_codigo').val();
        var upunidad= $('#up_unidad').val();
        var upvalor= $('#up_valor').val();
        var upfecha= $('#up_fecha').val();
        var uporigen= $('#up_origen').val();

        if(upnombre=="" || upcodigo=="" || upunidad=="" || upvalor=="" || upfecha=="" || uporigen=="")
        {
            $('#up_mensaje').html('<div class="alert alert-warning"> Los campos no pueden estar vacios</div>');
            $('#actualizar').modal('show');
        }
        else
        {
            $.ajax(
                {
                    url: '../Tarea_Desarrollo/controlador/actualizar.php',
                    method: 'post',
                    data:{U_ID:UpID,U_nombre:upnombre,U_codigo:upcodigo,U_unidad:upunidad,U_valor:upvalor,U_fecha:upfecha,U_origen:uporigen},
                    success: function(data)
                    {
                        $('#up_mensaje').html(data);
                        $('#actualizar').modal('show');
                        $('form').trigger('reset');
                        $('#tabla').DataTable().ajax.reload();
                    }
                })
        }
        
    })
}

// eliminar
function eliminar_registro()
{
    $(document).on('click','#btn_eliminar',function()
    {
        var eliminar_ID = $(this).attr('data-id1');
        $('#eliminar').modal('show');

        $(document).on('click','#btn_eliminar_registro',function()
        {
            $.ajax(
                {
                    url: '../Tarea_Desarrollo/controlador/eliminar.php',
                    method: 'post',
                    data:{Eli_ID:eliminar_ID},
                    success: function(data)
                    { 
                        $('#eli_mensaje').html(data).hide(5000);
                        $('#tabla').DataTable().ajax.reload();
                    }
                })
        })
    })
}
