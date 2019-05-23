var letreros = {

    add_letrero: function(){
        $('#agregar_letrero').on('submit', function(form){
            
            form.preventDefault();
            
            var data = {
                nombre_proyecto : $('#txt_nombre_pro').val(), 
                nombre_letrero : $('#txt_nom_letrero').val(), 
                fecha_inicio : $('#txt_fecha_in').val(), 
                fecha_final : $('#txt_fecha_fin').val(),
                descripcion : $('#txt_descripcion').val(), 
            }
            cargar_ajax.run_server_ajax('letreros/crear_letrero', data);
            swal({
                    title: 'CORRECTO',
                    text: 'SE AGREGO CORRECTAMENTE EL LETRERO',
                    type: 'success',
                    closeOnConfirm: false
                },function(){
                    window.location.assign(base_url + 'letreros');
                });
        });
    },

    datos_editar_letreros: function(){
        $(document).on('click','button.editar_letrero', function () {
            
            var data = {id_letrero: $(this).data('id')};    
            var response = cargar_ajax.run_server_ajax('letreros/datos_editar_letrero', data);

            $('#txt_nom_letrero_editar').val(response.DATA_LETREROS.nombre_letrero);
            $('#txt_fecha_in_editar').val(response.DATA_LETREROS.fecha_inicio);
            $('#txt_fecha_fin_editar').val(response.DATA_LETREROS.fecha_final);
            $('#txt_descripcion_editar').val(response.DATA_LETREROS.descipcion);
            

        });
    },

    editar_editar_letreros: function(){
        $("#editar_letreros").on("submit", function (e) {
            e.preventDefault();
                var data = 
                {
                    nombre_letrero : $('#txt_nom_letrero_editar').val(), 
                    fecha_inicio : $('#txt_fecha_in_editar').val(), 
                    fecha_final : $('#txt_fecha_fin_editar').val(),
                    creador_proyecto : $('#txt_descripcion_editar').val(),  
                    
                }
                
                

                 var response = cargar_ajax.run_server_ajax('letreros/editar_letrero', data);
                 
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

    eliminar_letrero: function(){
        $(document).on('click', 'button.eliminar_letrero', function () {
            var id_letrero = $(this).data('id');
            var data = {id_letrero: id_letrero};

            swal({
                title: "ESTA SEGURO DE ELIMINAR ESTE LETRERO?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Si, eliminar",
                closeOnConfirm: false,
                allowEscapeKey: false,
                allowEnterKey: false
            }, function () {
                cargar_ajax.run_server_ajax('letreros/eliminar_letrero', data);
                swal('Eliminado!', 'Se elimino correctamente el letrero', 'success');
                var toDelete = '#tr_' + id_letrero;
                console.log(toDelete);
                $(toDelete).remove();
                
            });
        });
  },
}
    $(document).ready(function() { 
    letreros.add_letrero(this);
    letreros.datos_editar_letreros(this);
    letreros.editar_editar_letreros(this);
    letreros.eliminar_letrero(this);
});
