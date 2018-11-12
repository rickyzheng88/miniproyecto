<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System extends CI_Model
{
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

	public function product_search($field)
	{
		return $this->db->select('(productos.id) as id, (productos.nombre) as nombre, existencia, precio,(catalogo.nombre) as catalogo')
						->join('catalogo', 'idcategoria = catalogo.id', 'inner')
						->where(array('productos.id' =>$field))
						->get('productos');
	}

	public function product_search_name($field)
	{
		return $this->db->select('(productos.id) as id, (productos.nombre) as nombre, existencia, precio,(catalogo.nombre) as catalogo')
						->join('catalogo', 'idcategoria = catalogo.id', 'inner')
						->like(array('productos.nombre' => $field))
						->get('productos');
	}

	public function product_search_type($field)
	{
		return $this->db->select('(productos.id) as id, (productos.nombre) as nombre, existencia, precio,(catalogo.nombre) as catalogo')
						->join('catalogo', 'idcategoria = catalogo.id', 'inner')
						->where(array('productos.idcategoria' => $field))
						->get('productos');
	}
}
?>