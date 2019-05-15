<script>var base_url = '<?php echo base_url() ?>';</script>

<div class="content-wrapper">
	<section class="content-header">
      <h1>
        CREACIÓN DE PROYECTOS
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>main"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="<?=base_url()?>proyectos">Proyectos</a></li>
      </ol>
    </section>
	<section class="content">
		<div class="row">
	        <div class="col-xs-12">
		        <div class="box">
		        	<div class="panel panel-primary">
						<div class="panel-heading"><center><h4>AGREGAR PROYECTO</h4></center></div>
					</div>
					<div class="box-body">
						<form class="form-horizontal" name="agregar_cliente" id="agregar_cliente">
				 			<div class="form-group">				 				
						 		<div class="col-lg-4">	
						 			<label>Nombre De Proyecto:</label>
									<input type="text" class="form-control" required id="txt_nombre_pro" name="txt_nombre_pro" placeholder="NOMBRE DEL PROYECTO" maxlength="150" onKeyUp="this.value=this.value.toUpperCase();">
						 		</div>

						 		<div class="col-lg-4">
						 			<label>Nombre De Cliente:</label>
									<input type="text" class="form-control" required id="txt_nom_cliente" name="txt_nom_cliente" placeholder="NOMBRE DE CLIENTE" maxlength="150" onKeyUp="this.value=this.value.toUpperCase();">
						 		</div>
						 	</div>
						 	<div class="form group" style="margin-left: -15px">
						 		<div class="col-lg-4">
						             	<label>Fecha De Inicio:</label>
						                <div class="input-group date">
							                <div class="input-group-addon">
							                	<i class="fa fa-calendar"></i>
							                </div>
							                <input type="text" class="form-control pull-right" id="txt_fechaI" name="txt_fechaI" required="true" autocomplete="off" placeholder="dd-mm-yyyy">
						                </div>
						                <!-- /.input group -->
						            </div>
						 		<div class="col-lg-4" style="margin-left: 3px">
						 			<label>Fecha Final:</label>
									<div class="input-group date">
							                <div class="input-group-addon">
							                	<i class="fa fa-calendar"></i>
							                </div>
							                <input type="text" class="form-control pull-right" id="txt_fechaF" name="txt_fechaF" autocomplete="off" placeholder="dd-mm-yyyy">
						                </div>
						 		</div>
						 		<div class="col-lg-8">	
						 			<label>Ceador Del Proyecto:</label>
									<input type="text" class="form-control" required id="txt_creador_pro" name="txt_creador_pro" placeholder="CREADOR DEL PROYECTO" maxlength="150" onKeyUp="this.value=this.value.toUpperCase();">
						 		</div>					 			
						 	</div>
						 	<br/><br/><br/><br/>
						 	<hr>
						 	<div class="row col-lg-4" style="margin-top: 25px;">
						 		<button type="submit" class="btn btn-primary">Guardar Proyecto</button>
						 		<a type="button" href="<?=base_url()?>proyectos" class="btn btn-default">Cancelar</a>
						 	</div>
					 	</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>