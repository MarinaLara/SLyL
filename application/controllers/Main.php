<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Main_model');
	} 

	public function index()
	{			
		if($this->session->userdata('logueado') != 0)
		{
			$this->load->view('headers/librerias');
			$this->load->view('headers/menu');
			$this->load->view('inicio/inicio');
			$this->load->view('footers/librerias'); 
		}else
		{
			$script = '';
			$this->load->view('inicio/login',$script);
		}
	}

	public function login()
	{		
		$usuario = trim($this->input->post('txt_usuario'));
		$password = trim($this->input->post('txt_password'));
		$query = $this->Main_model->auntenticar($usuario,$password);
		if($query == false)
		{	
			$script = array('mensajes_swal' => 'swal("ERROR","Usuario o password Incorrectos", "error");');
			$this->load->view('inicio/login',$script);

		}else{
			
			foreach ($query->result() as $row) 
			{
				$id_usuario = $row->id_usuario;
				$usuario = $row->usuario_email;
				$nombre = $row->nombre;
				$apellido_p = $row->apellido_p;
				$apellido_m = $row->apellido_m;
				$password = $row->contrasena;
				$nivel = $row->id_nivel;
			}
			$newdata = array(
				'id_usuario' => $id_usuario,
				'usuario' => $usuario,
				'nombre' => $nombre,
				'apellido_p' => $apellido_p,
				'apellido_m' => $apellido_m,
				'password' => $password,
				'nivel' => $nivel,
				'logueado'=> 1,
			);

			$this->session->set_userdata($newdata);
			$this->index();			
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
