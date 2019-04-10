var main = {

    editar_contraseña_main: function(){
        $("#modificar_contrasena_menu").on("submit", function (e) {
            e.preventDefault();

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
                    id_usuario: $('#id_usuario').val(),
                }
                
                var response = cargar_ajax.run_server_ajax('main/editar_contrasena_main', data);

                if (response == 'false') 
                {
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
            }
        });
    },

}
jQuery(document).ready(function() { 
    main.editar_contraseña_main(this);
});