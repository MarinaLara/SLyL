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
			        </div>
			    </div>
		        <div class="box">
					<div class="box-body table-responsive">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th><center>ID</center></th>
									<th><center>Nombre Del Proyecto</center></th>
									<th><center>Descripcion</center></th>
									<th><center>Creador Del Proyecto</center></th>
									<th class="no-sort"><center>Opciones</center></th>
								</tr>
							</thead>
							<tbody>
								<?php if($DATA_LETREROS != FALSE) {
									foreach ($DATA_LETREROS->result() as $row) {
								?>
									<tr id="tr_<?= $row->nombre_proyecto;?>" name="tr_<?= $row->nombre_proyecto; ?>" >
										<td><center><a href="<?=base_url()?>archivos"><?= $row->id_letrero;?></a></center></td>
										<td><center>
											<?= $row->nombre_proyecto;?>
										</center></td>
										<td><center>
											<?= $row->descripcion;?>
										</center></td>
										<td><center>
											<?= $row->creador_proyecto;?>
										</center></td>
										<td><center>
											<button data-id="<?= $row->nombre_proyecto; ?>" class="btn btn-primary editar_proyecto"  data-toggle="modal" data-target="#modal_proyecto_editar" ><i class="fa fa-edit"></i><span data-toggle="tooltip" data-placement="top" title="Modificar Proyecto" ></span></button>

											<button data-id="<?= $row->nombre_proyecto; ?>" class="btn btn-danger eliminar_proyecto" title="Eliminar Proyecto" data-toggle="tooltip" data-placement="top">  <i class="fa fa-close"></i></button>
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