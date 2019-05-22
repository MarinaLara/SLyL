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
		
		if($this->session->userdata('logueado') == TRUE)
		{
			$data = array(
				'DATA_LETREROS' => $this->Letreros_model->get_letreros(),
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
}