<?php
	$nombre = $this->session->userdata('nombre').' '.$this->session->userdata('apellido_p').' '.$this->session->userdata('apellido_m');
?>
<div class="content-wrapper">
	<section class="content">
		<div class="row">
    		<div class="col-lg-12">
				<div class="col-lg-12">
					<div class="box box-solid">
						<div class="box-header with-border">
							<center> <h3 class="box-title">Bienvenido <?= $nombre; ?> por favor seleccione la empresa en la que desea trabajar en la seccion empresas</h3></center>
						</div>
						<div class="box-body">
							
							
						</div>
					</div>
				</div>


			</div>
		</div>
	</section>
</div>