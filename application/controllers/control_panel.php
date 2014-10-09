<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Control_panel extends MY_User {

	function __construct(){
		parent:: __construct();
		$this->dataPage['title']='Panel principal';
		$this->dataPage['isAdmin']=$this->_isAdmin();
	}

	function index(){
		$this->dataPage['content_view']='main_panel/main_view';

		$this->dataPage['dataContent']['name']=$this->_getSesName();
		$this->load->view('templates/main_template', $this->dataPage);
	}

	function viewPerfil(){
		$this->load->model('MUser');

	}

}