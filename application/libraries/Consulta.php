<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Consulta extends CI_Model
{
	protected $error;
	protected $success;

	public function __construct()
	{
		parent::__construct();
		$this->error = FALSE;
		$this->success = TRUE;
		$this->load->database('default');
	}

	public function create($tabla, $campo = array())
	{
		return $create_result = ($this->db->insert($tabla, $campo)) ? $this->success : $this->error;
	}

	public function read($tabla,$campo = '', $donde = NULL, $join = NULL)
	{
		($campo === '') ? $this->db->select('*') : $this->db->select($campo);
		($donde === NULL) ? : $this->db->where($donde);
		($join === NULL) ? : $this->db->join('')
		return ($this->db->get($tabla)->result()) ?  : $this->error;
	}

	public function update()
	{

	}

	public function delete()
	{

	}
}
?>