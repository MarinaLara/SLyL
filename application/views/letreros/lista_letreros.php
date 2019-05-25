<div class="content-wrapper">
	<section class="content-header">
      <h1 class="Display1">
        LETREROS
      </h1>
      <ol class="breadcrumb">
        <li><u><a href="<?=base_url()?>main"><i class="fa fa-dashboard"></i> Inicio</a></u></li>
        <li><u><a href="<?=base_url()?>proyectos"><i class="fa fa-clipboard"></i> Proyectos</a></u></li>
      </ol>
      </section>
      <section class="content">
		<div class="row">
	        <div class="col-xs-12">
	          	<div class="box">
		            <div class="box-header">
		            	<div class="col-lg-offset-10">
		              		<a type="button" class="btn btn-block btn-primary" href="<?=base_url()?>letreros/add_letreros"><i class="fa fa-plus"></i> Nuevo Letrero</a>
		              	</div>
			        </div>
			    </div>
		        <div class="box">
					<div class="box-body table-responsive">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									
									<th><center>Nombre Del Proyecto</center></th>
									<th><center>Nombre Del Letrero</center></th>
									<th><center>Fecha de Inicio</center></th>
									<th><center>Fecha Final</center></th>
									<th><center>Descripcion</center></th>
									<th><center>Creador Del Proyecto</center></th>
									<th class="no-sort"><center>Opciones</center></th>
								</tr>
							</thead>
							<tbody>
								<?php if($DATA_LETREROS != FALSE) {
								foreach ($DATA_LETREROS->result() as $row) {
								?>
									<tr id="tr_<?= $row->id_letrero;?>" name="tr_<?= $row->id_letrero; ?>" >
										<td><center><?= $row->nombre_proyecto;?></center></td>
										<td><center>
											<a href="<?=base_url()?>archivos"><?= $row->nombre_letrero;?></a>
										</center></td>
										<td><center>
											<?= $row->fecha_ini;?>
										</center></td>
										<td><center>
											<?= $row->fecha_fi;?>
										</center></td>
										<td><center>
											<?= $row->descripcion;?>
										</center></td>
										<td><center>
											<?= $row->creador_proyecto;?>
										</center></td>
										
										<td><center>
											<button data-id="<?= $row->id_letrero; ?>" class="btn btn-primary editar_letrero"  data-toggle="modal" data-target="#modal_letrero_editar" ><i class="fa fa-edit"></i><span data-toggle="tooltip" data-placement="top" title="Modificar Letrero" ></span></button>

											<button data-id="<?= $row->id_letrero; ?>" class="btn btn-danger eliminar_letrero" title="Eliminar Letrero" data-toggle="tooltip" data-placement="top">  <i class="fa fa-close"></i></button>
										</center></td>
									</tr>
								<?php
									}
								 }?>
							</tbody> 
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
  </div>

  <!-- MODAL PARA EDITAR LOS LETREROS -->
<div class="modal fade" id="modal_letrero_editar" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" >
            <div class="modal-header">
            	<center><h3 class="modal-title">Modificar Letrero</h3></center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <hr>    
            </div>
            <div class="modal-body">
	            <form  name="editar_letreros" id="editar_letreros">
	            	<input type="hidden" id="id_letrero_editar" name="id_letrero_editar" >
	            	<div class="row">
				 		<div class="form-group col-lg-4">
				 			<label >Nombre De Letrero:</label>
							<input type="text" class="form-control" id="txt_nom_letrero_editar" name="txt_nom_letrero_editar" placeholder="NOMBRE DE LETRERO" maxlength="20" onKeyUp="this.value=this.value.toUpperCase();" required="true" required="true">
				 		</div>
				 		<div class="form-group col-lg-4">
				 			<label >Descripcion:</label>
							<input type="text" class="form-control" id="txt_descripcion_editar" name="txt_descripcion_editar" placeholder="DESCRIPCION" maxlength="150" onKeyUp="this.value=this.value.toUpperCase();" required="true" required="true">
				 		</div>				 		
					</div>
					<div class="row" style="margin-top: 30px;">
						<div class="form-group col-lg-4">
				 			<label >Fecha De Inicio:</label>
							<input type="text" class="form-control datetime" required id="txt_fecha_ini_editar" name="txt_fecha_ini_editar" placeholder="yyyy-mm-dd" maxlength="150" autocomplete="off" required="true">
				 		</div>
				 		<div class="form-group col-lg-4">
				 			<label >Fecha Final:</label>
							<input type="text" class="form-control datetime" required id="txt_fecha_fi_editar" name="txt_fecha_fi_editar" placeholder="yyyy-mm-dd" maxlength="150" autocomplete="off" required="false">
				 		</div>	
	 				</div>
	 				<hr>
	 				<div class="row modal-footer" style="margin-top: 10px;">
	                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	                    <button type="submit" class="btn btn-primary">Guardar</button>
	                </div>
						 </div>					 			
	 				<hr>
	 				</div>
				</form> 
            </div>
        </div>
    </div>
</div>
<!-- FIN DEL MODAL PARA EDITAR LOS CLIENTES -->