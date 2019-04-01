var main = {



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
        $("#modificar_contrasena_main").on("submit", function (e) {
            e.preventDefault();
            alert('hola mundo');
            var contrasena1 = $('#nueva').val();
            var contrasena2 = $('#confirmacion').val();

            if(contrasena1 != contrasena2)
            {
                swal("Error!", "Contraseñas no coinciden!", "warning");
            }
            else
            {   
                var data = {
                	
                    contrasena : $('#nueva').val(),
                }
                console.log(data);
                cargar_ajax.run_server_ajax('usuarios/editar_contrasena', data);
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
                     //location.reload(); 
                 });
             }
        });
    },

}
jQuery(document).ready(function() { 
    main.datos_editar_usuarios(this);
    main.editar_editar_usuarios(this);
});