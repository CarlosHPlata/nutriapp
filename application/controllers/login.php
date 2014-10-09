<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller{

	function __construct(){
		parent:: __construct();
		$this->load->library('encrypt');
		$this->load->model('MUser');
		$this->load->library('form_validation');

		$this->data['msg']='';

		//iniciando reglas de validacion de formularios
			$this->init_validation_rules=array(
			array(
				'field' => 'username',
				'label' => 'Nombre de usuario',
				'rules' => 'required|xss_clean'
			),
			array(
				'field' => 'password',
				'label' => 'Contraseña',
				'rules' => 'required|xss_clean'
			)
			);

			$this->forgot_validation_rules=array(

			);
		//terminando reglas de validacion de formularios

	}

	function index(){
		if(!$this->_isSessionStart()){
			$this->load->view('login/index',$this->data);
		} 
		else redirect('control_panel');
	}

	function init(){
		$this->form_validation->set_rules($this->init_validation_rules);

		if($this->form_validation->run() == FALSE){
			$this->load->view('login/index',$this->data);
		} else {
			$username=$this->input->post('username');
			$password=$this->input->post('password');

			$user=$this->MUser->autentication($username, $password);

			if($user!=FALSE){
				$this->session->set_userdata('name', $user['name']);
				$this->session->set_userdata('lname', $user['apellido']);
				$this->session->set_userdata('iduser', $user['iduser']);
				$this->session->set_userdata('isAdmin', $user['isAdmin']);

				$this->data['msg']='yeah tas bien mamey '.$this->session->userdata['username'].' '.$this->session->userdata['iduser'];
				if($this->session->userdata['isAdmin']) $this->data['msg'].=' es admin este cabron';
				else $this->data['msg'].=' nooo nomas es un pobre pendejo';

				redirect('control_panel');
			} else {
				$this->data['msg']='usuario o contraseña incorrectos';
				$this->load->view('login/index',$this->data);
			}
		}
	}

	function forgot_password(){
		$this->form_validation->set_rules($this->forgot_validation_rules);

	}

	function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}


	function _isSessionStart(){
		if($this->session->userdata('username') ){
			return TRUE;
		} else{
			return FALSE;
		}
	}
}