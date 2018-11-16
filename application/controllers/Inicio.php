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

	public function insert()
	{
		$query = $this->system->create();
		$data['insert'];
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
