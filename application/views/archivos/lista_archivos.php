<div class="content-wrapper">
	<section class="content-header">
      <h1 class="Display1">
        ARCHIVOS
      </h1>
      <ol class="breadcrumb">
        <li><u><a href="<?=base_url()?>index.php/main"><i class="fa fa-dashboard"></i> Inicio</a></u></li>
        <li><u><a href="<?=base_url()?>archivos">Archivos</a></u></li>
      </ol>
    </section>
	<section class="content">
		<div class="row">
	        <div class="col-xs-12">
	          	<div class="box">
		            <div class="box-header">
		            	<div class="col-lg-offset-10">
		              		<a type="button" class="btn btn-block btn-primary" href="<?=base_url()?>archivos/add_archivo"><i class="fa fa-plus"></i> Nuevo Archivo</a>
		              	</div>
			        </div>
			    </div>
		        <div class="box">
					<div class="box-body table-responsive">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th><center>ID Archivo</center></th>
									<th><center>Nombre del Archivo</center></th>
									<th class="no-sort"><center>Opciones</center></th>
								</tr>
							</thead>
							<tbody>
								<?php if($DATA_ARCHIVO != FALSE) {
									foreach ($DATA_ARCHIVO->result() as $row) {
								?>
									<tr id="tr_<?= $row->id_archivo;?>" name="tr_<?= $row->id_archivo; ?>" >
										<td>
											<center><?= $row->id_archivo;?></center>
										</td>
										<td>
											<a href="<?=base_url().$row->path?>" target="_blank">
											<center><i class="fa fa-file">&nbsp<?= $row->nombre_archivo;?></i></center>
											</a>
										</td>
										<td>
											<center><button data-id="<?= $row->id_archivo; ?>" class="btn btn-danger eliminar_archivo" title="Eliminar Archivo" data-toggle="tooltip" data-placement="top">  <i class="fa fa-close"></i></button></center>
										</td>
										<td></td>
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
