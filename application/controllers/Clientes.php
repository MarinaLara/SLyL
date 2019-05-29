<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Clientes_model');
	} 

	public function index()
	{
		
		if($this->session->userdata('logueado') == TRUE)
		{
			$data = array(
				'DATA_CLIENTES' => $this->Clientes_model->get_clientes(),
			);

			$this->load->view('headers/librerias');
			$this->load->view('headers/menu');
			$this->load->view('clientes/lista_clientes',$data);
			$this->load->view('footers/librerias');
		}else
		{
			$script = '';
			$this->load->view('inicio/login',$script);
		}
	}

	public function add_client()
	{
		if($this->session->userdata('logueado') == TRUE)
		{
			$this->load->view('headers/librerias');
			$this->load->view('headers/menu');
			$this->load->view('clientes/add_clientes');
			$this->load->view('footers/librerias');
		}else
		{
			$script = '';
			$this->load->view('inicio/login',$script);
		}
		
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

	public function crear_cliente()
	{
		if($this->input->is_ajax_request()){
			$data = array(				
				'nombre_cliente' => trim($this->input->post('nombre')),
				'correo_cliente' => trim($this->input->post('correo_cliente')),
				'telefono_cliente' => trim($this->input->post('telefono_cliente')),
				'fecha_nacimiento' => trim($this->input->post('fecha_nacimiento')),
			);
			$this->Clientes_model->insert_clientes($data);
			echo json_encode($data);
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
