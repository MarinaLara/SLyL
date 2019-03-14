<div class="content-wrapper">
	<section class="content-header">
      <h1>
        CREACIÓN DE USUARIOS DEL SISTEMA
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Usuarios</a></li>
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

						 		<div class="col-lg-2">
						 			<label>Apellido Materno:</label>
									<input type="text" class="form-control" required id="txt_apellido_m" name="txt_apellido_m" placeholder="APELLIDO MATERNO" maxlength="150" onKeyUp="this.value=this.value.toUpperCase();">
						 		</div>

						 		<div class="col-lg-3">
						 			<label>Correo:</label>
									<input type="email" class="form-control" id=txt_user name="txt_user" placeholder="CORREO ELECTRONICO" maxlength="150" required>
						 		</div>					 			
						 	</div>

					 		<div class="form-group" style="margin-top: 45px;">
					 			<div class="col-lg-2">
						 			<label>Constraseña:</label>
						 			<input type="password" class="form-control" id="password" name="password" placeholder="CONTRASEÑA" maxlength="150" required>
						 		</div>
						 		<div class="col-lg-2">
						 			<label>Confirmar Constraseña:</label>
						 			<input type="password" class="form-control" id="confir_password" name="confir_password" placeholder="CONFIRMAR CONTRASEÑA" maxlength="150" required>
						 		</div>			 			
						 		<!--<div class="col-lg-4">
                                    <label >Empresas:</label>
                                    <select class="form-control select2" id="select_empresas" name="select_empresas" required>
                                    	<option value >SELECCIONAR UNA EMPRESA</option>
                                        <?php foreach ($DATA_EMPRESAS as $single_key) { ?>
                                            <option value="<?= $single_key->id_empresa; ?>"><?= $single_key->razonSocial; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>-->
                                <div class="col-lg-2">
                                    <label>Niveles:</label>
                                    <select class="form-control select2" id="select_nivel" name="select_nivel" required>
                                        <option value >SELECCIONAR UN NIVEL</option>
                                            <?php foreach ($DATA_NIVELES as $single_key) { ?>
                                                <option value="<?= $single_key->id_nivel_usuario; ?>"><?= $single_key->descripcion; ?></option>
                                            <?php } ?>
                                    </select>
                                </div>
			 				</div>

						 	<div class="row col-lg-3" style="margin-top: 15px;">
						 		<button type="submit" class="btn btn-primary">Guardar Usuario</button>
						 		<a type="button" href="<?=base_url()?>usuarios" class="btn btn-default">Cancelar</a>
						 	</div>
					 	</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>