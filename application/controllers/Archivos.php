<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archivos extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Archivos_model');
	} 

	public function index()
	{
		
		if($this->session->userdata('logueado') == TRUE)
		{
			$data = array(
				'DATA_ARCHIVO' => $this->Archivos_model->get_archivos(),
			);

			$this->load->view('headers/librerias');
			$this->load->view('headers/menu');
			$this->load->view('archivos/lista_archivos',$data);
			$this->load->view('footers/librerias');
		}else
		{
			$script = '';
			$this->load->view('inicio/login',$script);
		}
	}

	public function add_archivo()
	{
		if($this->session->userdata('logueado') == TRUE)
		{
			$this->load->view('headers/librerias');
			$this->load->view('headers/menu');
			$this->load->view('archivos/add_archivos');
			$this->load->view('footers/librerias');
		}else
		{
			$script = '';
			$this->load->view('inicio/login',$script);
		}
		
	}

	public function crear_archivo()
	{
		
		$target_dir = base_url()."files/";
		$target_file = $target_dir . basename($_FILES["archivo"]["name"]);
		$uploadOk = 1;

		echo $target_file;
		/*//$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

		// Check if image file is a actual image or fake image
		if (isset($_POST["submit"])) {

		    if ($target_file == "upload/") {
		        $msg = "cannot be empty";
		        $uploadOk = 0;
		    } // Check if file already exists
		    else if (file_exists($target_file)) {
		        $msg = "Sorry, file already exists.";
		        $uploadOk = 0;
		    } // Check file size
		    else if ($_FILES["fileToUpload"]["size"] > 5000000) {
		        $msg = "Sorry, your file is too large.";
		        $uploadOk = 0;
		    } // Check if $uploadOk is set to 0 by an error
		    else if ($uploadOk == 0) {
		        $msg = "Sorry, your file was not uploaded.";

		        // if everything is ok, try to upload file
		    } else {
		        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		            $msg = "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
		        }
		    }
		}*/
	}




	public function datos_editar_cliente()
	{
		if($this->input->is_ajax_request())
		{
			
			$id_cliente = $this->input->post('id_cliente');
			$data = array(
				'DATA_CLIENTE' => $this->Clientes_model->get_clientes_by_id($id_cliente),
			);
			//var_dump($data);
			echo json_encode($data);
		}
		else
		{
            show_404();
        }
	}

	public function editar_cliente()
	{
		if($this->input->is_ajax_request()){
			$id_cliente = $this->input->post('id_cliente');
			
			$data = array(				
				'nombre_cliente' => trim($this->input->post('nombre_cliente')),
				'correo_cliente' => trim($this->input->post('correo_cliente')),
				'telefono_cliente' => trim($this->input->post('telefono_cliente')),
				'fecha_nacimiento' => trim($this->input->post('fecha_nacimiento')),
			);

			$this->Clientes_model->update_cliente($data,$id_cliente);
			var_dump($data);
		}else{
            show_404();
        }
	}

	

	public function eliminar_cliente()
	{
		if($this->input->is_ajax_request()){

			$id_cliente = $this->input->post('id_cliente');
			$data = array(
				'activo' => 0,
			);
			$this->Clientes_model->delete_clientes($id_cliente,$data);

		}
		else
		{
            show_404();
        }
	}
}
