<?php 
class MUser extends CI_Model{

	function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('encrypt');
        
        $this->table='user';
    }

    function getAllRecords(){
    	$consulta = $this->db->get($this->table);
    	return $consulta->result_array();
    }

    function getByID($id){
    	$consulta = $this->db->get_where($this->table, array('iduser'=>$id));
        $consulta = $consulta->row_array();
        if( isset($consulta['username']) ){
            return $consulta;
        }else {
            return FALSE;
        }
    }

    function getByUsername($username){
    	$user = $this->db->get_where($this->table, array('username'=>$username) );
    	$user = $user->row_array();
        if( isset($user['username']) ) return $user;
        else return FALSE;
    }

    function autentication($username, $password){
        $user = $this->db->get_where($this->table, array('username'=>$username) );
        $user = $user->row_array();
        $response = FALSE;

        if( isset($user['username']) && $user['isActive'] ){
            $decodePass=$this->encrypt->decode($user['password']);

            if($decodePass==$password){
                $response = $user;
            }
        }

        return $response;
    }

    function insert($iduser=NULL, $username, $password, $name, $apellido, $isAdmin ,$isActive){
    	$data= array();

    	$encryptPass= $this->encrypt->encode($password);

    	if($iduser!=NULL){
    		$data['iduser']=$iduser;
    	} 

    	$data['username']=$username;
    	$data['password']=$encryptPass;
    	$data['name']=$name;
    	$data['apellido']=$apellido;
    	$data['isAdmin']=$isAdmin;
    	$data['isActive']=$isActive;

    	if($this->db->insert($this->table,$data)){
    		return $this->db->insert_id();
    	} else {
    		return FALSE;
    	}

    }

    function update($iduser, $username, $password, $name, $apellido, $isAdmin ,$isActive){
        $password=$this->encrypt->encode($password);

        $data=array(
            'username' => $username,
            'password' => $password,
            'name'     => $name,
            'apellido' => $apellido,
            'isAdmin'  => $isAdmin,
            'isActive' => $isActive
        );

        $this->db->where('iduser', $iduser);
        if ( $this->db->update($this->table, $data) ) return TRUE;
        else return FALSE;
    }

    function delete($iduser){
        $data['isActive']=FALSE;

        $this->db->where('iduser', $iduser);
        if ( $this->db->update($this->table, $data) ) return TRUE;
        else return FALSE;
    }



    function nextId(){
        $query =  $this->db->query(" SELECT MAX(id)+1 as num FROM ".$this->table);
        $r =$query->row();
        return $r->num;
    }

}