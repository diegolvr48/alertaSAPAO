<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Model
{
	public function getUser($data='')
	{
		$query = $this->db->get_where('users',$data);
		if($query->num_rows()>0)
		{
			return $query->row_array();
		}
		else
		{
			return FALSE;
		}
	}
	public function setSuministro($data='')
	{
		$query = $this->db->insert('suministro',$data);
		if($query)
			return TRUE;
		else
			return FALSE;
	}
	public function getPolygon()
	{
		$query = $this->db->get_where('polygon');
		return $query->result_array();
	}
	public function getVecesxColonia()
	{
		$query = $this->db->query('SELECT nombre,count(a.nombre) as cantidad from (SELECT DISTINCT nombre, fecha FROM suministro) as a group by a.nombre ORDER BY cantidad DESC');
		if($query -> num_rows()>0)
			return $query->result_array();
		else
			return FALSE;
	}
	public function getGanona()
	{
		$query = $this->db->query('SELECT DISTINCT nombre, COUNT(fecha) maximo FROM suministro GROUP BY nombre ORDER BY maximo DESC LIMIT 1');
		if($query->num_rows()>0)
			return $query->row_array();
		else
			return FALSE;
	}
	public function getPorturno($tipo='')
	{
		$query = $this->db->query('SELECT nombre,count(a.turno) as cantidad from (SELECT nombre, turno FROM suministro where (turno="'.$tipo.'")) as a group by nombre ORDER BY cantidad desc');
		if($query->num_rows()>0)
			return $query->result_array();
		else
			return FALSE;
	}
	public function getColoniaTurno($tipo='')
	{
		$query = $this->db->query('SELECT nombre, turno ,count(turno) maximo from suministro where (turno="'.$tipo.'") GROUP BY nombre ORDER BY maximo DESC LIMIT 1');
		if($query->num_rows()>0)
			return $query->row_array();
		else
			return FALSE;
	}
}