<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sesion extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('system');
		$this->load->library('session');
		$this->load->helper('cookie');
	}

	public function _remap($param)
	{
		switch ($param) {
			case 'validate':
					$this->_validate();
				break;
			case 'regist':
					$this->regist();
				break;
			case 'regist_user':
				$this->_regist_user();
				break;
			case 'sesion':
				$this->sesion();
				break;
			case 'cerrar_sesion':
				$this->_cerrar_sesion();
				break;
			default:
					$this->index();
				break;
		}
	}

	public function index()
	{
		$this->load->view('sesion');
	}

	private function _validate()
	{
		if($this->input->post()){
			$data['usuario'] = $_POST['usuario'];

			foreach ($_POST as $key => $value) {
				$datos["$key"] = $value;
			}
			$vacios = array_filter($datos);
			if(count($vacios) < count($datos)){
				$data['vacios'] = $datos;
			
			$this->load->view('sesion', $data);

			} else {

				$validacion = $this->system->validate('usuario', array('usuario' => $_POST['usuario'], 'contraseña' => $_POST['password']));

				if($validacion->row() == 1){

					foreach($validacion->result() as $result){
						$usuario = $result->usuario;
						$correo = $result->correo;
						$telefono = $result->telefono;
						$idusuario = $result->id;
					}

					$_SESSION['usuario'] = $usuario;
					$_SESSION['correo'] = $correo;
					$_SESSION['telefono'] = $telefono;
					$_SESSION['idusuario'] = $idusuario;


					/* ---------------- seccion de cookies para recordar usuario ------------------ */

					if(isset($_POST['recordar']) && ($_POST['recordar'] == 1)){
						$cookie = array('name' => 'usuario', 'value' => $usuario, 'expire' => 60*60*48);
						$this->input->set_cookie($cookie);
					} else {
						if(isset($_COOKIE['usuario'])){
							delete_cookie('usuario');
						}
					}
					/* ----------------------------^^^^^ COOKIES ^^^^^------------------------------- */

					redirect('inicio/', 'location');

				} else {
					$data['incorrect'] = true;
					$this->load->view('sesion', $data);
				}

			}
		} else {

			$this->load->view('sesion');

		}
	}

	public function regist()
	{
		$this->load->view('registrar_usuario');
	}

	private function _regist_user()
	{
	/* ---------------------------------- VALIDACION DE DATOS --------------------------------- */
		if($this->input->post()){	

				$usuario = $_POST['usuario'];
				$clave = $_POST['clave'];
				$repeat = $_POST['repeat'];
				$correo = $_POST['correo'];
				$telefono = $_POST['telefono'];

			/* Validamos los datos inputs, para ver si estan vacios. */
			foreach($_POST as $key => $value){
				$datos["$key"] = $value;
			}
			$vacios = array_filter($datos);

			/* Validamos los datos, para saber si hay caracteres no permitidos */
			if(preg_match("/[\W]|[\s]/", $usuario)){
				$caracter['usuario'] = $usuario;
			} 
			if($clave != $repeat){
				$caracter['repeat'] = $repeat;
			}
			if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $correo)){
				$caracter['correo'] = $correo;
			}
			if(preg_match("[\D]", $telefono)){
				$caracter['telefono'] = $telefono;
			}

			/* Comprobamos si ya existe el nombre de usuario introducido */
			$query = $this->system->validate('usuario',array('usuario' => $usuario));
			if($query->row_array() > 0){
				$existe = true;
			}

			/* Mandando todos los datos incorrectos (si existe), a la vista para mostrar al usuario */
			$data['vacios'] = $datos;
			$data['_POST'] = $_POST;
			if(isset($caracter)){
				$data['caracter'] = $caracter;
			}
			if (isset($existe)) {
				$data['existe'] = $existe;
			}
		
			if((isset($caracter) && count($caracter) > 0) || (count($vacios) < count($datos)) || (isset($existe))){
				$this->load->view('registrar_usuario', $data);
			} else {

				/* Insertando datos del usuario en la base de datos */
				$datos = array('usuario' => $usuario, 'contraseña' => $clave, 'correo' => $correo, 'telefono' => $telefono);

				if($this->system->insert('usuario', $datos)){
					$success = true;
					$data['success'] = $success;
					$this->load->view('registrar_usuario', $data);
				} else {
					$fail = true;
					$data['fail'] = $fail;
					$this->load->view('registrar_usuario', $data);
				}
			}

		} else {
			redirect('sesion/regist', 'location');
		}
	}

	private function _cerrar_sesion()
	{
		session_unset();
		session_destroy();
		redirect('inicio/', 'location');
	}
}
?>