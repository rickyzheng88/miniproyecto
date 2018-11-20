<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System extends CI_Model
{
	public $product_field = array('id' => 'productos.id', 'nombre' => 'productos.nombre', 'categoria' => 'productos.idcategoria');

	public function __construct()
	{
		parent::__construct();
		$this->load->database('default');
	}

	public function all_products()
	{	return $this->db->select('(productos.id) as id, (productos.nombre) as nombre, existencia, precio,(catalogo.nombre) as catalogo')
						->join('catalogo', 'idcategoria = catalogo.id', 'inner')
						->get('productos');
	}

	public function product_search($field, $product_f, bool $wol = FALSE)
	{
		$operation = array($this->product_field[$product_f] => $field);

			$this->db->select('(productos.id) as id, (productos.nombre) as nombre, existencia, precio,(catalogo.nombre) as catalogo')
			->join('catalogo', 'idcategoria = catalogo.id', 'inner');
			($wol) ? $this->db->like($operation) : $this->db->where($operation);
		return $this->db->get('productos');
	}

	public function validate($table,$fields = array())
	{
		return $this->db->get_where($table, $fields);
	}

	public function insert($table,$fields = array())
	{
		return $this->db->insert($table, $fields);
	}

	public function delete($id,$table)
	{
		return $this->db->delete($table, array('id' => $id));
	}

	public function update($table,$fields = array(), $id)
	{
			   $this->db->where('id',$id);
		return $this->db->update($table, $fields);
	}
}
?>