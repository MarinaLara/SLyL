var proyectos = {
	add_proyecto: function(){
        $('#agregar_proyecto').on('submit', function(form){
            
            form.preventDefault();
            
            var data = {
                correo_cliente : $('#txt_user').val(), 
                nombre : $('#txt_nombre').val(), 
                telefono_cliente : $('#txt_telefono').val(), 
                fecha_nacimiento : $('#txt_fecha').val(), 
            }
            cargar_ajax.run_server_ajax('clientes/crear_cliente', data);
            swal({
                    title: 'CORRECTO',
                    text: 'SE AGREGO CORRECTAMENTE EL CLIENTE',
                    type: 'success',
                    closeOnConfirm: false
                },function(){
                    window.location.assign(base_url + 'clientes');
                });
        });
    },
}