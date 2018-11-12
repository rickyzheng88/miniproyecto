<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('system');
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

	public function search_id()
	{
		if($this->input->post()){
			$query = $this->system->product_search($_POST['id']);
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

	public function search_name()
	{
		if($this->input->post()){
			$query = $this->system->product_search_name($_POST['nombre']);
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

	public function search_type()
	{
		if($this->input->post()){
			$query = $this->system->product_search_type($_POST['categoria']);
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
