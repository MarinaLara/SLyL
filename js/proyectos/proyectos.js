var proyectos = {

    add_proyecto: function(){
        $('#agregar_proyecto').on('submit', function(form){
            
            form.preventDefault();
            
            var data = {
                nombre_proyecto : $('#txt_nombre_pro').val(), 
                nombre_cliente : $('#txt_nom_cliente').val(), 
                fecha_inicio : $('#txt_fecha_in').val(), 
                fecha_final : $('#txt_fecha_fin').val(),
                creador_proyecto : $('#txt_creador_pro').val(), 
            }
            cargar_ajax.run_server_ajax('proyectos/crear_proyecto', data);
            swal({
                    title: 'CORRECTO',
                    text: 'SE AGREGO CORRECTAMENTE EL PROYECTO',
                    type: 'success',
                    closeOnConfirm: false
                },function(){
                    window.location.assign(base_url + 'proyectos');
                });
        });
    },

    datos_editar_proyectos: function(){
        $(document).on('click','button.editar_proyecto', function () {
            
            var data = {nombre_proyecto: $(this).data('id')};    
            var response = cargar_ajax.run_server_ajax('proyectos/datos_editar_proyecto', data);

            $('#txt_nombre_pro_editar').val(response.DATA_PROYECTO.nombre_proyecto);
            $('#txt_nom_cliente_editar').val(response.DATA_PROYECTO.nombre_cliente);
            $('#txt_fecha_in_editar').val(response.DATA_PROYECTO.fecha_inicio);
            $('#txt_fecha_fin_editar').val(response.DATA_PROYECTO.fecha_final);
            $('#txt_creador_pro_editar').val(response.DATA_PROYECTO.creador_proyecto);
            

        });
    },

    editar_editar_proyectos: function(){
        $("#editar_proyectos").on("submit", function (e) {
            e.preventDefault();
                var data = 
                {
                    nombre_proyecto : $('#txt_nombre_pro_editar').val(), 
                    nombre_cliente : $('#txt_nom_cliente_editar').val(), 
                    fecha_inicio : $('#txt_fecha_in_editar').val(), 
                    fecha_final : $('#txt_fecha_fin_editar').val(),
                    creador_proyecto : $('#txt_creador_pro_editar').val(),  
                    
                }
                
                

                 var response = cargar_ajax.run_server_ajax('proyectos/editar_proyecto', data);
                 
                 if (response == 'false') {
                     title = "Error!";
                     icon = "error";
                     mensaje = "No se pudo realizar la actualicación";
                 } else {
                     icon = "success";
                     title = "Actualización de información";
                     mensaje = "Se actualizo la información correctamente";
                 }
                 swal({
                     title: title,
                     text: mensaje,
                     type: icon,
                     closeOnConfirm: false
                 }, function () {
                     location.reload(); 
                 });
        });
    },

    eliminar_proyecto: function(){
        $(document).on('click', 'button.eliminar_proyecto', function () {
            var nombre_proyecto = $(this).data('id');
            var data = {nombre_proyecto: nombre_proyecto};

            swal({
                title: "Esta SEGURO DE ELIMINAR ESTE PROYECTO?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Si, eliminar",
                closeOnConfirm: false,
                allowEscapeKey: false,
                allowEnterKey: false
            }, function () {
                cargar_ajax.run_server_ajax('proyectos/eliminar_proyecto', data);
                swal('Eliminado!', 'Se elimino correctamente el proyecto', 'success');
                var toDelete = '#tr_' + nombre_proyecto;
                console.log(toDelete);
                $(toDelete).remove();
                
            });
        });
  },
}
    $(document).ready(function() { 
    proyectos.add_proyecto(this);
    proyectos.datos_editar_proyectos(this);
    proyectos.editar_editar_proyectos(this);
    proyectos.eliminar_proyecto(this);
});
