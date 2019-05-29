<div class="content-wrapper">
	<section class="content-header">
      <h1 class="Display1">
        PROYECTOS
      </h1>
      <ol class="breadcrumb">
        <li><u><a href="<?=base_url()?>main"><i class="fa fa-dashboard"></i> Inicio</a></u></li>
      </ol>
      </section>
      <section class="content">
		<div class="row">
	        <div class="col-xs-12">
	          	<div class="box">
		            <div class="box-header">
		            	<div class="col-lg-offset-10">
		              		<a type="button" class="btn btn-block btn-primary" href="<?=base_url()?>proyectos/add_proyectos"><i class="fa fa-plus"></i> Nuevo Proyecto</a>
		              	</div>
			        </div>
			    </div>
		        <div class="box">
					<div class="box-body table-responsive">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									
									<th><center>Nombre Del Proyecto</center></th>
									<th><center>Nombre Del Cliente</center></th>
									<th><center>Fecha De Inicio</center></th>
									<th><center>Fecha Final</center></th>
									<th><center>Creador Del Proyecto</center></th>
									<th><center>Fase</center></th>
									<th class="no-sort"><center>Opciones</center></th>
								</tr>
							</thead>
							<tbody>
								<?php if($DATA_PROYECTOS != FALSE) {
									foreach ($DATA_PROYECTOS->result() as $row) {
								?>
									<tr id="tr_<?= $row->id_proyecto;?>" name="tr_<?= $row->id_proyecto; ?>" >
										<td><center><a href="<?=base_url()?>proyectos/letreros/<?=$row->id_proyecto?>"><?= $row->nombre_proyecto;?></a></center></td>
										<td><center>
											<?= $row->nombre_cliente;?>
										</center></td>
										<td><center>
											<?= $row->fecha_inicio;?>
										</center></td>
										<td><center>
											<?= $row->fecha_final;?>
										</center></td>
										<td><center>
											<?= $row->creador_proyecto;?>
										</center></td>
										<td><center>
											<?= $row->fase_proyecto;?>
										</center></td>
										<td><center>
											<button data-id="<?= $row->id_proyecto; ?>" class="btn btn-primary editar_proyecto"  data-toggle="modal" data-target="#modal_proyecto_editar" ><i class="fa fa-edit"></i><span data-toggle="tooltip" data-placement="top" title="Modificar Proyecto" ></span></button>
											<button data-id="<?= $row->id_proyecto; ?>" class="btn btn-danger eliminar_proyecto" title="Eliminar Proyecto" data-toggle="tooltip" data-placement="top">  <i class="fa fa-close"></i></button>
										</center></td>
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

  <!-- MODAL PARA EDITAR LOS PROYECTOS -->
<div class="modal fade" id="modal_proyecto_editar" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" >
            <div class="modal-header">
            	<center><h3 class="modal-title">Modificar Proyecto</h3></center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <hr>    
            </div>
            <div class="modal-body">
	            <form  name="editar_proyectos" id="editar_proyectos">
	            	<input type="hidden" id="id_proyecto_editar" name="id_proyecto_editar" >
	            	<div class="row">
				 		<div class="form-group col-lg-4">	
				 			<label >Nombre De Proyecto:</label>
							<input type="text" class="form-control" required id="txt_nombre_pro_editar" name="txt_nombre_pro_editar" placeholder="NOMBRE DEL PROYECTO" maxlength="150" onKeyUp="this.value=this.value.toUpperCase();" required="true">
				 		</div>

				 		<div class="form-group col-lg-4">
				 			<label >Nombre De Cliente:</label>
							<input type="text" class="form-control" id="txt_nom_cliente_editar" name="txt_nom_cliente_editar" placeholder="NOMBRE DE CLIENTE" maxlength="12" onKeyUp="this.value=this.value.toUpperCase();" required="true" required="true">
				 		</div>			 		
					</div>

			 		<div class="row" style="margin-top: 30px;">
			 			<div class="form-group col-lg-4">
				 			<label >Fecha De Inicio:</label>
							<input type="text" class="form-control datetime" required id="txt_fecha_in_editar" name="txt_fecha_in_editar" placeholder="yyyy-mm-dd" maxlength="150" autocomplete="off" required="true">
				 		</div>
				 		<div class="form-group col-lg-4">
				 			<label >Fecha Final:</label>
							<input type="text" class="form-control datetime" required id="txt_fecha_fin_editar" name="txt_fecha_fin_editar" placeholder="yyyy-mm-dd" maxlength="150" autocomplete="off" required="false">
				 		</div>	
				 		<div class="col-lg-4">	
						 		<label>Creador Del Proyecto:</label>
								<input type="text" class="form-control" required id="txt_creador_pro_editar" name="txt_creador_pro_editar" placeholder="CREADOR DEL PROYECTO" maxlength="150" onKeyUp="this.value=this.value.toUpperCase();">
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
