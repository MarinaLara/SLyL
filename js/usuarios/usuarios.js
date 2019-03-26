var usuarios = {

    add_usuario: function(){
        $('#agregar_usuarios').on('submit', function(form){
            form.preventDefault();
            //var base_url = '<?php echo base_url() ?>';
            var data = {
                usuario_email : $('#txt_user').val(), 
                nombre : $('#txt_nombre').val(), 
                apellido_p : $('#txt_apellido_p').val(), 
                apellido_m : $('#txt_apellido_m').val(), 
                contrasena : $('#confir_password').val(), 
                id_nivel : $('#select_nivel').val(), 
            }
            console.log(base_url);

            cargar_ajax.run_server_ajax('usuarios/crear_usuarios', data);
            swal({
                title: 'CORRECTO',
                text: 'SE AGREGO CORRECTAMENTE EL USUARIO',
                type: 'success',
                closeOnConfirm: false
            },function(){
                window.location.assign(base_url + 'usuarios');
            });
        });
    },

	datos_editar_usuarios: function(){
        $(document).on('click','button.editar_user', function () {
            var data = {id_usuario: $(this).data('id')};            
            var response = cargar_ajax.run_server_ajax('usuarios/datos_editar_usuario', data);
            $('#id_usuario_editar').val(response.DATA_USUARIO.id_usuario);

            $('#txt_nombre_editar').val(response.DATA_USUARIO.nombre);
            $('#txt_apellido_p_editar').val(response.DATA_USUARIO.apellido_p);
            $('#txt_apellido_m_editar').val(response.DATA_USUARIO.apellido_m);
            $('#txt_user_editar').val(response.DATA_USUARIO.usuario_email);
            
            $('#select_nivel_editar').val(response.DATA_USUARIO.id_nivel);

        });
    },

    editar_editar_usuarios: function(){
        $("#editar_usuarios").on("submit", function (e) {
            e.preventDefault();
                var data = {
                	id_usuario: $('#id_usuario_editar').val(), 
                	nombre: $('#txt_nombre_editar').val(),
                	apellido_p: $('#txt_apellido_p_editar').val(), 
                	apellido_m: $('#txt_apellido_m_editar').val(),
                	usuario: $('#txt_user_editar').val(), 
                	id_nivel: $('#select_nivel_editar').val(),
                }
                
                

                 var response = cargar_ajax.run_server_ajax('usuarios/editar_usuario', data);
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

    eliminar_usuario: function(){
        $(document).on('click', 'button.eliminar_user', function () {
            id_usuario = $(this).data('id');
            var data = {id_usuario: id_usuario};

            swal({
                title: "¿Esta seguro de eliminar este usuario?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Si, eliminar",
                closeOnConfirm: false,
                allowEscapeKey: false,
                allowEnterKey: false
            }, function () {
                cargar_ajax.run_server_ajax('usuarios/eliminar_usuario', data);
                swal('Eliminado!', 'Se elimino correctamente el usuario', 'success');
                var toDelete = '#tr_' + id_usuario;
                console.log(toDelete);
                $(toDelete).remove();
                
            });
        });
  },
}
jQuery(document).ready(function() { 
    usuarios.add_usuario(this);
    usuarios.datos_editar_usuarios(this);
    usuarios.editar_editar_usuarios(this);
    usuarios.eliminar_usuario(this);
});