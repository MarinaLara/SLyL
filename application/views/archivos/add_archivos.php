

<div class="content-wrapper">
	<section class="content-header">
      <h1>
        ALMACENAMIENTO DE ARCHIVOS
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>index.php/main"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="<?=base_url()?>archivos">Archivos</a></li>
      </ol>
    </section>
	<section class="content">
		<div class="row">
	        <div class="col-xs-12">
		        <div class="box">
		        	<div class="panel panel-primary">
						<div class="panel-heading"><center><h4>AGREGAR ARCHIVOS</h4></center></div>
					</div>
					<div class="box-body">
						<form action="<?=base_url()?>archivos/crear_archivo" method="post" enctype="multipart/form-data">
				 			<div class="form-group">
				 				<label>Escrba el nombre del archivo</label>
				 				<input type="text" class="form-control" id="nombre_archivo" name="nombre_archivo" required="true">
				 			</div>
				 			<div class="form-group">
				 				<label>Seleccionar Archivo</label>
				 				<input type="file" class="form-control" id="archivo" name="archivo" name="uploadedfile" type="file" required="true" >
				 			</div>
						 	<div class="form-group">
						 		<button type="submit" class="btn btn-primary">Guardar Archivo</button>
						 		<a type="button" href="<?=base_url()?>index.php/archivos" class="btn btn-default">Cancelar</a>
						 	</div>
					 	</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>