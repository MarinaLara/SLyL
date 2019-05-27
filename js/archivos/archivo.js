var archivos = {
    add_archivo: function(){
        $('#agregar_archivo').on('submit', function(form){
            
            form.preventDefault();
            
            var data = { 
                nombre_archivo: $('#nombre_archivo').val(),
                id_letrero: $('#id_proyecto').val(),
            }
            cargar_ajax.run_server_ajax('archivos/crear_archivo', data);
            swal({
                    title: 'CORRECTO',
                    text: 'SE AGREGO CORRECTAMENTE EL ARCHIVO',
                    type: 'success',
                    closeOnConfirm: false
                },function(){
                    window.location.assign(base_url + 'archivos?letrero='+$('#id_letrero').val());
                });
        });



	eliminar_archivo: function(){
        $(document).on('click', 'button.eliminar_archivo', function () {
            var id_archivo = $(this).data('id');
            var data = {id_archivo: id_archivo};
            swal({
                title: "¿Esta seguro de eliminar este archivo?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Si, eliminar",
                closeOnConfirm: false,
                allowEscapeKey: false,
                allowEnterKey: false
            }, function () {
                cargar_ajax.run_server_ajax('archivos/eliminar_archivo', data);
                swal('Eliminado!', 'Se elimino correctamente el archivo', 'success');
                var toDelete = '#tr_' + id_archivo;
                console.log(toDelete);
                $(toDelete).remove();
                
            });
        });
	}
}
$(document).ready(function() { 
    archivos.eliminar_archivo(this);
});

