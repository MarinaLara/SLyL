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
		
		//OBTENERE EL ID DE ARCHIVO 
		$nombre_archivo = $this->input->post('nombre_archivo');
		$data = array(
			'nombre_archivo' => $nombre_archivo,
			'activo' => 1,	
		);
		$this->Archivos_model->insert_archivos($data);	
		$DATA_ID = $this->Archivos_model->get_last_id();
		if($DATA_ID != FALSE)
		{
			foreach ($DATA_ID->result() as $row) 
			{
				$id_archivo = $row->id_archivo;
				$update_filename = $row->id_archivo + 1;
			}
		}else
		{
			
			$update_filename = 1;
		}



		$config['upload_path'] = './files/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 2000;
        //$config['max_width'] = 1500;
        //$config['max_height'] = 1500;
        $config['file_name'] = $update_filename;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('archivo')) {
            $path = '/files/'.$this->upload->data('file_name');
            $data = array(
            	'path'=> $path,
            );
            var_dump($data);
            $this->Archivos_model->update_path($id_archivo,$data);
            
        } 
        else 
        {
            echo  $this->upload->display_errors();
        }
        redirect('archivos');
	}




	// public function datos_editar_cliente()
	// {
	// 	if($this->input->is_ajax_request())
	// 	{
			
	// 		$id_cliente = $this->input->post('id_cliente');
	// 		$data = array(
	// 			'DATA_CLIENTE' => $this->Clientes_model->get_clientes_by_id($id_cliente),
	// 		);
	// 		//var_dump($data);
	// 		echo json_encode($data);
	// 	}
	// 	else
	// 	{
 //            show_404();
 //        }
	// }

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

	

	public function eliminar_archivo()
	{
		if($this->input->is_ajax_request()){

			$id_archivo = $this->input->post('id_archivo');
			$data = array(
				'activo' => 0,
			);
			$this->Archivos_model->delete_archivos($id_archivo,$data);

		}
		else
		{
            show_404();
        }
	}
}
