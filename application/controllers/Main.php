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
		if($this->session->userdata('logueado') == TRUE)
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
		$data = array(
			'usuario' => $this->input->post('txt_usuario',true),
			'password' => $this->input->post('txt_password',true),
		);

		$query = $this->Main_model->auntenticar($data);
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
				'logueado'=> TRUE,
			);

			$this->session->set_userdata($newdata);
			redirect('Main');		
		}
	}

	public function editar_contrasena_main()
	{
		if($this->input->is_ajax_request()){
			
			$id_usuario = trim($this->input->post('id_usuario'));
			$data = array(				
				'contrasena' => trim($this->input->post('contrasena')),
			);
			var_dump($data);
			var_dump($id_usuario);
			$this->Main_model->update_usuarios_main($data,$id_usuario);
		
		}else{
            show_404();
        }
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}


	public function recordarContrasena()
	{
		$this->load->view('inicio/restablecer_contrasena');
	}

	public function enviarContrasena()
	{
		if(isset($_POST['email'])) {
		
			$email = $_POST['email'];
			$DATA_CORREO = $this->Main_model->get_password($email);

			if($DATA_CORREO != FALSE)
			{
				foreach ($DATA_CORREO->result() as $row) 
				{
					$password = $row->contrasena;
				}
				

			}
			else
			{
				//CAMBIAR POR SWAL
				print '<script type="text/javascript">alert("No se encontro ningun usuario con el nombre ingresado por favor revise");</script>';
				
			}

			echo $email;
			// Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
			$email_to = "letrasylogos@pinguinosystems.com";
			$email_subject = "RESTABLECER CONTRASEÑA";
			$email_from = "";
			// Aquí se deberían validar los datos ingresados por el usuario
			if(!isset($_POST['email'])) 
			{

				echo "<script>alert(\"Ocurrió un error y el formulario no ha sido enviado,Por favor, vuelva atrás y verifique la información ingresada\");</script>";
				
				die();
			}

			$email_message = "Su Contraseña es la siguiente:\n\n" . $password;


			// Ahora se envía el e-mail usando la función mail() de PHP
			$headers = 'From: '.$email_from."\r\n".
			'Reply-To: '.$email_from."\r\n" .
			'X-Mailer: PHP/' . phpversion();
			@mail($email_to, $email_subject, $email_message, $headers);


			print '<script type="text/javascript">alert("Su contraseña se ha enviado correctamente al correo de destino");</script>';
			$this->index();		
		}
	}

}
