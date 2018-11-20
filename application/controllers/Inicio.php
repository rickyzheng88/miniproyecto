<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('system');
		$this->load->library('session');
	}

	public function index()
	{
		$query = $this->system->all_products();
		$data['query'] = $query;
		$this->load->view('index', $data);
	}

	public function regist_products()
	{
		if(isset($_SESSION['usuario'])){
		$this->load->view('productos');
		} else {
			redirect('inicio', 'location');
		}
	}

	public function edit($id)
	{	
		$query = $this->system->product_search($id, 'id');
		$data['query'] = $query;
		$this->load->view('editar', $data);
	}

	public function insert()
	{
		if($this->input->post()){
			foreach ($_POST as $key => $value) {
				$datos["$key"] = $value;
			}
			$vacios = array_filter($datos);
			if(count($vacios) < count($datos)){
				$data['vacios'] = $datos;
				$data['prueba'] = $vacios;
			
			$this->load->view('productos', $data);
			} else {

				$nombre = $_POST['nombre'];
				$precio = $_POST['precio'];
				$categoria = $_POST['categoria'];
				$usuario = $_POST['usuario'];
				$existencia = $_POST['existencia'];
				
				$array = array('nombre' => $nombre, 'precio' => $precio, 'idcategoria' => $categoria, 'idusuario' => $usuario, 'existencia' => $existencia);

				$query = $this->system->insert('productos', $array);
			
				if($query){
					$data['success'] = TRUE;
					$this->load->view('productos', $data);
				} else {
					$data['fail'] = TRUE;
					$this->load->view('productos', $data);
				}
			}
		} else {
			redirect('inicio/regist_products', 'location');
		}
		
	}
	public function update()
	{
		if(isset($_SESSION['usuario'])){
			if($this->input->post()){
				$fields['nombre'] = $_POST['nombre'];
				$fields['precio'] = $_POST['precio'];
				$fields['idcategoria'] = $_POST['categoria'];
				$fields['idusuario'] = 1;
				$fields['existencia'] = $_POST['existencia'];
				$id = $_POST['id'];

				if($this->system->update('productos', $fields, $id)){
					$data['success'] = TRUE;
					$query = $this->system->product_search($id, 'id');
					$data['query'] = $query;
					$this->load->view('editar', $data);
				} else {
					$data['fail'] = TRUE;
					$query = $this->system->product_search($id, 'id');
					$data['query'] = $query;
					$this->load->view('editar', $data);
				}
			} else {
				redirect('inicio', 'location');
			}
		} else {
			redirect('inicio', 'location');
		}
	}

	public function delete($id,$table)
	{
		if(isset($_SESSION['usuario'])){
			if($this->system->delete($id,$table)){
				$this->index();
			} else {
				show_error('No se pudo eliminar el producto, por favor intente de nuevo.', '404');
			}
		}
	}

	public function search_products()
	{
		if($this->input->post()){
			$values = (array_values($_POST));

			$campo = array_search($values[0], $_POST);

			$wol = (isset($_POST['wol'])) ? $wol = TRUE : $wol = FALSE;

			$query = $this->system->product_search($values[0], $campo, $wol);
			if($query->row_array()<1){
				$data['empty'] = TRUE;
				$this->load->view('index', $data);
			} else {
				$data['query'] = $query;
				$this->load->view('index', $data);
			}
		} else {
			$this->load->view('index');
		}

	}

}
