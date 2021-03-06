<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyectos extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Proyectos_model');
	} 

	public function index()
	{
		
		if($this->session->userdata('logueado') == TRUE)
		{
			$data = array(
				'DATA_PROYECTOS' => $this->Proyectos_model->get_proyectos(),
			);

			$this->load->view('headers/librerias');
			$this->load->view('headers/menu');
			$this->load->view('proyectos/lista_proyectos', $data);
			$this->load->view('footers/librerias');
		}else
		{
			$script = '';
			$this->load->view('inicio/login',$script);
		}
	}

	public function letreros()
	{
		$newdata = array(
			'id_proyecto' => $this->uri->segment(3),
		);
		$this->session->set_userdata($newdata);
		redirect('letreros/');
	}

	public function add_proyectos()
	{
		if($this->session->userdata('logueado') == TRUE)
		{
			$this->load->view('headers/librerias');
			$this->load->view('headers/menu');
			$this->load->view('proyectos/add_proyectos');
			$this->load->view('footers/librerias');
		}else
		{
			$script = '';
			$this->load->view('inicio/login',$script);
		}
		
	}

	public function datos_editar_proyecto()
	{
		if($this->input->is_ajax_request())
		{
			
			$id_proyecto = $this->input->post('id_proyecto');
			$data = array(
				'DATA_PROYECTOS' => $this->Proyectos_model->get_proyectos_by_id($id_proyecto),
			);
			//var_dump($data);
			echo json_encode($data);
		}
		else
		{
            show_404();
        }
	}

	public function editar_proyecto()
	{
		if($this->input->is_ajax_request()){
			$id_proyecto = $this->input->post('id_proyecto');
			
			$data = array(				
				'nombre_proyecto' => trim($this->input->post('nombre_proyecto')),
				'nombre_cliente' => trim($this->input->post('nombre_cliente')),
				'fecha_inicio' => trim($this->input->post('fecha_inicio')),
				'fecha_final' => trim($this->input->post('fecha_final')),
				'creador_proyecto' => trim($this->input->post('creador_proyecto')),
			);

			$this->Proyectos_model->update_proyecto($data,$id_proyecto);
			var_dump($data);
		}else{
            show_404();
        }
	}

	public function crear_proyecto()
	{
		if($this->input->is_ajax_request()){
			$data = array(				
				'nombre_proyecto' => trim($this->input->post('nombre_proyecto')),
				'nombre_cliente' => trim($this->input->post('nombre_cliente')),
				'fecha_inicio' => trim($this->input->post('fecha_inicio')),
				'fecha_final' => trim($this->input->post('fecha_final')),
				'creador_proyecto' => trim($this->input->post('creador_proyecto')),
			);
			$this->Proyectos_model->insert_proyecto($data);
			echo json_encode($data);
		}else{
            show_404();
        }
	}

	public function eliminar_proyecto()
	{
		if($this->input->is_ajax_request()){

			$id_proyecto = $this->input->post('id_proyecto');
			$data = array(
				'activo' => 0,
			);
			$this->Proyectos_model->delete_proyecto($id_proyecto,$data);

		}
		else
		{
            show_404();
        }
	}
}