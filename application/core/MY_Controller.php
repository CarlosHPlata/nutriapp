<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
| Clase My_Controler controlador principal
| Extiende del controlador core de codeIgniter
|
| Es solo una instancia del controlador principal, para usos de personalizacion
| y extensión.
*/

	class MY_Controller extends CI_Controller{

		public $dataPage;

		function __construct(){
			parent::__construct();

			$this->dataPage['title']='Bienvenido';
			$this->dataPage['styles']=array();
			$this->dataPage['js']=array();
			$this->dataPage['dataContent']=array();
		}

	}

/*
| Clase My_User
| Extiende del controlador principale
|
| Esta clase se encarga de administrar los controladores de paginas
| que cualquier usuario puede ver.
| En caso de no iniciar sesion redireccionar al logins
*/

	class MY_User extends MY_Controller{

		private $isAdmin, $sesName, $sesIdUser, $sesLName;

		function __construct(){
			parent::__construct();

			if(!$this->session->userdata('name')){
				redirect('login');
			} else {
				$this->isAdmin = $this->session->userdata('isAdmin');
				$this->sesName = $this->session->userdata('name');
				$this->sesLName = $this->session->userdata('lname');
				$this->sesIdUser = $this->session->userdata('iduser');
			}
		}

		protected function _isAdmin(){
			return $this->isAdmin;
		}

		protected function _getSesName(){
			return $this->sesName;
		}

		protected function _getSesLName(){
			return $this->sesLName;
		}

		protected function _getSesIduser(){
			return $this->sesUsername;
		}

	}

/*
| Clase MY_Admin
| Extiende del controlador MY_User
|
| Esta clase se encarga de administrar los controladores de paginas
| que solo ADMINISTRADORES pueden ver.
| En caso de no iniciar sesion redirecciona al login (del constructor MY_User).
| En caso de no ser un administrador redirecciona al panel del control.
*/

	class MY_Admin extends MY_User{

		function __construct(){
			parent::__construct();

			if(_isAdmin()){
				redirect('control_panel');
			}
		}

	}
