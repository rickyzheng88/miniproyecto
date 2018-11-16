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

	/*public function product_search_name($field)
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
	} */

	public function user_validate($user,$password)
	{
		return $this->db->get_where('usuario', array('usuario' => $user, 'contraseña' => $password));
	}

	public function regist_user($user,$password,$email,$phone)
	{
		return $this->db->insert();
	}


}
?>