<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Usuarios_model');
	} 

	public function index()
	{
		if($this->session->userdata('logueado') == TRUE)
		{
			$data = array(
				//PARAMETRO FALSE CUANDO NO ES CLIENTE TRUE CUANDO SI LO ES
				'DATA_USUARIOS' => $this->Usuarios_model->get_usuarios(),
				'DATA_NIVELES' => $this->Usuarios_model->get_niveles(),
			);

			$this->load->view('headers/librerias');
			$this->load->view('headers/menu');
			$this->load->view('usuarios/lista_usuarios',$data);
			$this->load->view('footers/librerias');
		}else
		{
			//$script = '';
			$this->load->view('inicio/login');
		}
		
	}

	public function add_user()
	{
		if($this->session->userdata('logueado') == TRUE)
		{
			$data = array(
				'DATA_NIVELES' => $this->Usuarios_model->get_niveles(),
			);

			$this->load->view('headers/librerias');
			$this->load->view('headers/menu');
			$this->load->view('usuarios/add_usuarios',$data);
			$this->load->view('footers/librerias');
		}else
		{
			//$script = '';
			$this->load->view('inicio/login');
		}
	}

	public function crear_usuarios()
	{
		if($this->input->is_ajax_request()){
			$data = array(				
				'usuario_email' => trim($this->input->post('usuario_email')),
				'nombre' => trim($this->input->post('nombre')),
				'apellido_p' => trim($this->input->post('apellido_p')),
				'apellido_m' => trim($this->input->post('apellido_m')),
				'contrasena' => trim($this->input->post('contrasena')),
				'id_nivel' => trim($this->input->post('id_nivel')),
			);
			$this->Usuarios_model->insert_usuarios($data);
			echo json_encode($data);
		}else{
            show_404();
        }
	}

	public function datos_editar_usuario()
	{
		if($this->input->is_ajax_request()){

			$id_usuario = $this->input->post('id_usuario');
			$data = array(
				'DATA_USUARIO' => $this->Usuarios_model->get_usuarios_by_id($id_usuario),
			);
			echo json_encode($data);
		}else{
            show_404();
        }
	}

	public function editar_usuario()
	{
		if($this->input->is_ajax_request()){
			$id_usuario = $this->input->post('id_usuario');
			$data = array(				
				'usuario_email' => trim($this->input->post('usuario')),
				'nombre' => trim($this->input->post('nombre')),
				'apellido_p' => trim($this->input->post('apellido_p')),
				'apellido_m' => trim($this->input->post('apellido_m')),
				'id_nivel' => $this->input->post('id_nivel'),
			);

			$this->Usuarios_model->update_usuarios($data,$id_usuario);
		
		}else{
            show_404();
        }
	}

	public function editar_contrasena()
	{
		if($this->input->is_ajax_request()){
			$id_usuario = $this->input->post('id_usuario');
			$data = array(				
				'contrasena' => trim($this->input->post('contrasena')),
			);

			$this->Usuarios_model->update_usuarios($data,$id_usuario);
		
		}else{
            show_404();
        }
	}

	public function eliminar_usuario()
	{
		if($this->input->is_ajax_request()){

			$id_usuario = $this->input->post('id_usuario');

			$this->Usuarios_model->delete_usuarios($id_usuario);

		}else{
            show_404();
        }
	}
}
