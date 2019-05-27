<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Letreros extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Letreros_model');
	} 

	public function index()
	{
		//obtener variable por url param
		$proyecto = $this->input->get('proyecto');;
		
		if($this->session->userdata('logueado') == TRUE)
		{
			$data = array(
				'DATA_LETREROS' => $this->Letreros_model->get_letreros($proyecto),
				'ID_Proyecto'=>$proyecto,
			);

			$this->load->view('headers/librerias');
			$this->load->view('headers/menu');
			$this->load->view('letreros/lista_letreros', $data);
			$this->load->view('footers/librerias');
		}else
		{
			$script = '';
			$this->load->view('inicio/login',$script);
		}
	}

	public function add_letreros()
	{
		$proyecto = $this->input->get('proyecto');
		if($this->session->userdata('logueado') == TRUE)
		{
			$data = array(
				'ID_Proyecto'=>$proyecto,
			);
			$this->load->view('headers/librerias');
			$this->load->view('headers/menu');
			$this->load->view('letreros/add_letreros',$data);
			$this->load->view('footers/librerias');
		}else
		{
			$script = '';
			$this->load->view('inicio/login',$script);
		}
		
	}

	public function datos_editar_letrero()
	{
		if($this->input->is_ajax_request())
		{
			
			$id_letrero = $this->input->post('id_letrero');
			$data = array(
				'DATA_LETREROS' => $this->Letreros_model->get_letreros_by_id($id_letrero),
			);
			//var_dump($data);
			echo json_encode($data);
		}
		else
		{
            show_404();
        }
	}

	public function editar_letrero()
	{
		if($this->input->is_ajax_request()){
			$id_letrero = $this->input->post('id_letrero');
			
			$data = array(				
				'nombre_letrero' => trim($this->input->post('nombre_letrero')),
				'fecha_ini' => trim($this->input->post('fecha_ini')),
				'fecha_fi' => trim($this->input->post('fecha_fi')),
				'descripcion' => trim($this->input->post('descripcion')),
			);

			$this->Letreros_model->update_letreros($data,$id_letrero);
			var_dump($data);
		}else{
            show_404();
        }
	}

	public function crear_letrero()
	{
		if($this->input->is_ajax_request()){
			$data = array(				
				'nombre_letrero' => trim($this->input->post('nombre_letrero')),
				'fecha_ini' => trim($this->input->post('fecha_ini')),
				'fecha_fi' => trim($this->input->post('fecha_fi')),
				'descripcion' => trim($this->input->post('descripcion')),
				'id_proyecto' => trim($this->input->post('id_proyecto')),
			);
			$this->Letreros_model->insert_letreros($data);
			echo json_encode($data);
		}else{
            show_404();
        }
	}

	public function eliminar_letrero()
	{
		if($this->input->is_ajax_request()){

			$id_letrero = $this->input->post('id_letrero');
			$data = array(
				'activo' => 0,
			);
			$this->Letreros_model->delete_letreros($id_letrero,$data);

		}
		else
		{
            show_404();
        }
	}
}