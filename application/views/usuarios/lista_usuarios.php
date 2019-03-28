<?php
	if($DATA_NIVELES != FALSE)
	{
		foreach ($DATA_NIVELES->result() as $row) 
		{
			$id_nivel = $row->id_nivel;
			$departamento = $row->departamento;
			$nivel_usuario = $row->nivel_usuario;
		}
	} 
?>

<div class="content-wrapper">
	<section class="content-header">
      <h1>
        LISTADO DE USUARIOS
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>index.php/main"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Usuarios</a></li>
      </ol>
    </section>
	<section class="content">
		<div class="row">
	        <div class="col-xs-12">
	          	<div class="box">
		            <div class="box-header">
		            	<div class="col-lg-offset-10">
		              		<a type="button" class="btn btn-block btn-primary" href="<?=base_url()?>index.php/usuarios/add_user"><i class="fa fa-plus"></i> Nuevo Usuario</a>
		              	</div>
			        </div>
			    </div>
		        <div class="box">
					<div class="box-body table-responsive">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th><center>#</center></th>
									<th><center>Usuario</center></th>
									<th><center>Nombre</center></th>
									<th><center>Departamento</center></th>
									<th class="no-sort"><center>Opciones</center></th>
								</tr>
							</thead>
							<tbody>
								<?php if($DATA_USUARIOS != FALSE) {
									foreach ($DATA_USUARIOS as $row) {
								?>
									<tr id="tr_<?= $row->id_usuario; ?>" name="tr_<?= $row->id_usuario; ?>" >
										<td><center><?= $row->id_usuario;?></center></td>
										<td><center><?= $row->usuario_email;?></center></td>
										<td><center><?= $row->nombre.' '.$row->apellido_p.' '.$row->apellido_m; ?></center></td>
										<td>
											<center>
											<?php
											if($row->departamento != 'ROOT')
												echo $row->departamento;
											else
												echo 'SISTEMAS';
											?>
											</center>
										</td>

										<td>
										<?php
										if($row->id_nivel != 1)
										{
										?>
											<center>
												<button data-id="<?= $row->id_usuario; ?>" class="btn btn-primary editar_user"  data-toggle="modal" data-target="#modal_usuarios_editar" ><i class="fa fa-edit"></i><span data-toggle="tooltip" data-placement="top" title="Modificar Usuario" ></span></button>

												<button data-id="<?= $row->id_usuario; ?>" class="btn btn-danger eliminar_user" title="Eliminar Usuario" data-toggle="tooltip" data-placement="top">  <i class="fa fa-close"></i></button>
											</center>
										<?php
										}
										?>
										</td>
									</tr>
								<?php
									}
								} ?>
							</tbody> 
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


<!-- MODAL PARA EDITAR LOS USUARIOS -->
<div class="modal fade" id="modal_usuarios_editar" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" >
            <div class="modal-header">
            	<center><h3 class="modal-title">Modificar Usuarios</h3></center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <hr>    
            </div>
            <div class="modal-body">
	            <form  name="editar_usuarios" id="editar_usuarios">
	            	<input type="hidden" id="id_usuario_editar" name="id_usuario_editar" >
	            	<div class="row">
				 		<div class="form-group col-lg-4">	
				 			<label >Nombre:</label>
							<input type="text" class="form-control" required id="txt_nombre_editar" name="txt_nombre_editar" placeholder="NOMBRE" maxlength="150" onKeyUp="this.value=this.value.toUpperCase();">
				 		</div>

				 		<div class="form-group col-lg-4">
				 			<label >Apellido Paterno:</label>
							<input type="text" class="form-control" required id="txt_apellido_p_editar" name="txt_apellido_p_editar" placeholder="APELLIDO PATERNO" maxlength="150" onKeyUp="this.value=this.value.toUpperCase();">
				 		</div>

				 		<div class="form-group col-lg-4">
				 			<label >Apellido Materno:</label>
							<input type="text" class="form-control" required id="txt_apellido_m_editar" name="txt_apellido_m_editar" placeholder="APELLIDO MATERNO" maxlength="150" onKeyUp="this.value=this.value.toUpperCase();">
				 		</div>				 		
					</div>

			 		<div class="row" style="margin-top: 30px;">
			 			<div class="form-group col-lg-4">
				 			<label >Correo:</label>
							<input type="email" class="form-control" id=txt_user_editar name="txt_user_editar" placeholder="CORREO ELECTRONICO" maxlength="150" required>
				 		</div>
				 		<div class="col-lg-4">
                            <label >Niveles:</label>
                            <select class="form-control" style="width: 100%;" id="select_nivel_editar" name="select_nivel_editar" required>
	                               <?php
	                                if($DATA_NIVELES != FALSE)
		                            {		                                
		                                foreach ($DATA_NIVELES->result() as $row)
		                                {
		                                    echo '<option value="'.$row->id_nivel.'"';
		                                    if($row->id_nivel == $id_nivel)
		                                    {
		                                        echo ' selected';
		                                    }
		                                    echo '>';
		                                        echo $row->departamento;
		                                    echo '</option>';                                
		                                }
		                            
		                            }                                      
	                            ?>
                            </select>
                        </div>
				 		<!--<div class="form-group col-lg-7">
                            <label class="col-lg-12" >Empresas:</label>
                            <select class="form-control select2 " multiple="multiple"  style="width: 100%;" id="select_empresas_editar" name="select_empresas_editar[]" required>
                                <?php foreach ($DATA_EMPRESAS as $single_key) { ?>
                                    <option value="<?= $single_key->id_empresa; ?>"><?= $single_key->razonSocial; ?></option>
                                <?php } ?>
                            </select>
                        </div>-->
	 				</div>
	 				<hr>
				 	<div class="row modal-footer" style="margin-top: 10px;">
	                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	                    <button type="submit" class="btn btn-primary">Guardar</button>
	                </div>
				</form> 
            </div>
        </div>
    </div>
</div>
<!-- FIN DEL MODAL PARA EDITAR LOS USUARIOS -->