<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {
	function __construct()
  {
    parent::__construct();
		$this->load->model('users');
	}
	public function index()
	{
		$this->load->view('index');
	}
	public function mapa()
	{
		$this->load->view('mapa');
	}
	public function reportes()
	{
		$this->load->view('reportes');
	}
	public function estadisticas()
	{
		$this->load->view('estadisticas');
	}
	public function polygons()
	{
		$polygons = array();
		$suministradas = $this->users->getSuministro();
		foreach ($suministradas as $lugar) {
			if(preg_match('/COL./', $lugar['nombre']))
			{
				$col_name =  preg_replace('/COL. /','' , $lugar['nombre']);
				$col_map = $this->users->getIDCOL($col_name);
				if(isset($col_map['field1']))
					$polygons['colonias'][] = $this->users->getPolygon($col_map['field1']);
			}
		}
		echo json_encode($polygons);
	}
	public function login()
	{
		if(isset($_POST) && count($_POST)>0)
		{
			$data = $this->input->post();
			if($datos = $this->users->getUser(array('username'=>$data['username'],'password'=>MD5($data['password']))))
			{
				$user_data = array(
						'user_id' => $data['id'],
						'username' => $data['username'],
						'tipo' => $data['tipe'],
						'logg_in' => true
					);
				$this->session->set_userdata($user_data);
				redirect('inicio/registro');
			}
			else
			{
				$data = array(
					'error' => "Los Datos Son Incorrectos"
					);
				$this->load->view('login',$data);
			}

		}
		else
		{
			$this->load->view('login');
		}
	}
	public function registro()
	{
		if($this->session->userdata('logg_in'))
		{
			if(isset($_POST) && count($_POST) > 0)
			{
				$data = $this->input->post();
				foreach ($data['colonias'] as $colonia)
				{
					$this->users->setSuministro(array('nombre'=>$colonia,'turno'=>$data['turno']));
				}
				redirect('inicio/dia');
			}
			else
			{
				$this->load->view('registrar');
			}
		}
	}
	public function reportes1()
	{
		$response = [];
		if($data = $this->users->getVecesxColonia())
		{
			$response['vXc'] = $data;
		}
		if($data = $this->users->getGanona())
		{
			$response['ganona'] = $data;
		}
		if($data = $this->users->getPorturno('M'))
		{
			$response['turnoM'] = $data;
		}
		if($data = $this->users->getPorturno('V'))
		{
			$response['turnoV'] = $data;
		}
		if($data = $this->users->getPorturno('N'))
		{
			$response['turnoN'] = $data;
		}
		if($data = $this->users->getColoniaTurno('M'))
		{
			$response['coloniaM'] = $data;
		}
		if($data = $this->users->getColoniaTurno('V'))
		{
			$response['coloniaV'] = $data;
		}
		if($data = $this->users->getColoniaTurno('N'))
		{
			$response['coloniaN'] = $data;
		}
		echo json_encode($response);
	}
}