<script>var base_url = '<?php echo base_url() ?>';</script>
<div class="content-wrapper">
	<section class="content-header">
      <h1>
        CREACIÓN DE USUARIOS DEL SISTEMA
      </h1>
      <ol class="breadcrumb">
        <li><u><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></u></li>
        <li><u><a href="#">Usuarios</a></u></li>
      </ol>
    </section>
	<section class="content">
		<div class="row">
	        <div class="col-xs-12">
		        <div class="box">
		        	<div class="panel panel-primary">
						<div class="panel-heading"><center><h4>AGREGAR USUARIOS</h4></center></div>
					</div>
					<div class="box-body">
						<form class="form-horizontal" name="agregar_usuarios" id="agregar_usuarios">
				 			<div class="form-group">				 				
						 		<div class="col-lg-2">	
						 			<label>Nombre:</label>
									<input type="text" class="form-control" required id="txt_nombre" name="txt_nombre" placeholder="NOMBRE" maxlength="150" onKeyUp="this.value=this.value.toUpperCase();">
						 		</div>

						 		<div class="col-lg-2">
						 			<label>Apellido Paterno:</label>
									<input type="text" class="form-control" required id="txt_apellido_p" name="txt_apellido_p" placeholder="APELLIDO PATERNO" maxlength="150" onKeyUp="this.value=this.value.toUpperCase();">
						 		</div>
						 	</div>
						 	<div class="form group" style="margin-left: -15px">
						 		<div class="col-lg-2">
						 			<label>Apellido Materno:</label>
									<input type="text" class="form-control" id="txt_apellido_m" name="txt_apellido_m" placeholder="APELLIDO MATERNO" maxlength="150" onKeyUp="this.value=this.value.toUpperCase();">
						 		</div>

						 		<div class="col-lg-2" style="margin-left: 3px">
						 			<label>Correo:</label>
									<input type="email" class="form-control" id=txt_user name="txt_user" placeholder="CORREO ELECTRONICO" maxlength="150" required>
						 		</div>					 			
						 	</div>
						 	<br/><br/><br/><br/>
					 		<div class="form-group" style="margin-top: 2px;">
					 			<div class="col-lg-2">
						 			<label>Constraseña:</label>
						 			<input type="password" class="form-control" id="password" name="password" placeholder="CONTRASEÑA" maxlength="150" required>
						 		</div>
						 		<div class="col-lg-2">
						 			<label>Confirmar Constraseña:</label>
						 			<input type="password" class="form-control" id="confir_password" name="confir_password" placeholder="CONFIRMAR CONTRASEÑA" maxlength="150" required>
						 		</div>	
						 	</div>
						 	<div class="form-group">		 			
                                <div class="col-lg-4">
                                    <label>Departamento:</label>
                                    <select class="form-control" id="select_nivel" name="select_nivel" required>
                                        <option value >SELECCIONAR UN DEPARTAMENTO</option>
		                                <?php
		                                    if($DATA_NIVELES != FALSE)
		                                    {
		                                        foreach ($DATA_NIVELES->result() as $row) 
		                                        {
		                                        	if($row->departamento != 'ROOT'){
			                                            echo '<option value="'.$row->id_nivel.'">';	                                               
		                                                	echo $row->departamento;
		                                            	echo '</option>';
		                                    		}
		                                        } 
		                                    }                                    
		                                ?>
                                    </select>
                                </div>
			 				</div>

						 	<div class="row col-lg-3" style="margin-top: 15px;">
						 		<button type="submit" class="btn btn-primary">Guardar Usuario</button>
						 		<a type="button" href="<?=base_url()?>index.php/usuarios" class="btn btn-default" >Cancelar</a>
						 	</div>
					 	</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>