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
}