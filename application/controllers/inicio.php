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
	public function polygons()
	{
		echo json_encode($this->users->getPolygon());
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
}