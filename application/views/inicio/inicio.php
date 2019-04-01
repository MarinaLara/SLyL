<?php
	$nombre = $this->session->userdata('nombre').' '.$this->session->userdata('apellido_p').' '.$this->session->userdata('apellido_m');
?>

	
<div class="content-wrapper">
	<section class="content">
		<div class="row">
   		  <div class="col-lg-12">
				<div class="col-lg-12 bg-info">
					<div class="box box-solid">
						<div class="box-header with-border">

							<center> <h3 class="box-title display-3">Bienvenido</h3> <h3 class="Display-3"><?= $nombre; ?></h3>	</center>
							</div>									
							<div class="box-body" id="caja">
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
</div>