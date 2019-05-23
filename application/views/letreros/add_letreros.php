<script>var base_url = '<?php echo base_url() ?>';</script>

<div class="content-wrapper">
	<section class="content-header">
      <h1>
        CREACIÓN DE LETREROS
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>main"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="<?=base_url()?>proyectos">LETREROS</a></li>
      </ol>
    </section>
	<section class="content">
		<div class="row">
	        <div class="col-xs-12">
		        <div class="box">
		        	<div class="panel panel-primary">
						<div class="panel-heading"><center><h4>AGREGAR LETRERO</h4></center></div>
					</div>
					<div class="box-body">
						<form class="form-horizontal" name="agregar_letrero" id="agregar_letrero">
				 			<div class="form-group">				 				
						 		<div class="col-lg-4">
						 			<label>Nombre De Letrero:</label>
									<input type="text" class="form-control" required id="txt_nom_letrero" name="txt_nom_letrero" placeholder="NOMBRE DE LETRERO" maxlength="150" onKeyUp="this.value=this.value.toUpperCase();">
						 		</div>
						 		<div class="col-lg-4">
						 			<label>Descripcion:</label>
									<input type="text" class="form-control" required id="txt_descripcion" name="txt_descripcion" placeholder="DESCRIPCION" maxlength="150" onKeyUp="this.value=this.value.toUpperCase();">
						 		</div>
							</div>
							<div class="form group" style="margin-left: -15px">
						 		<div class="col-lg-4">
					             	<label>Fecha De Inicio:</label>
					                <div class="input-group date">
						                <div class="input-group-addon">
						                	<i class="fa fa-calendar"></i>
						                </div>
						                <input type="text" class="form-control pull-right datetime" id="txt_fecha_in" name="txt_fecha_in" required="true" autocomplete="off" placeholder="yyyy-mm-dd">
					                </div>
					                <!-- /.input group -->
						           </div>
						 		<div class="col-lg-4" style="margin-left: 3px">
						 			<label>Fecha Final:</label>
									<div class="input-group date">
						                <div class="input-group-addon">
						                	<i class="fa fa-calendar"></i>
						                </div>
						                <input type="text" class="form-control pull-right datetime" id="txt_fecha_fin" name="txt_fecha_fin"  autocomplete="off" placeholder="yyyy-mm-dd">
						            </div>
						 		</div>
						 	</div>						 			
						 	<br/><br/><br/><br/>
						 	<hr>
						 	<div class="row col-lg-4" style="margin-top: 25px;">
						 		<button type="submit" class="btn btn-primary">Guardar Letrero</button>
						 		<a type="button" href="<?=base_url()?>letreros" class="btn btn-default">Cancelar</a>
						 	</div>
					 	</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>