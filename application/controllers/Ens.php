<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Ens extends CI_Controller{

	
	function __construct ()
	{
		
		parent::__construct();
		//$this->load->model('Admin_model');
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->lang->load('fr_admin_lang','french');
	}
	public function index() {


			
			$this->load->view('../common/header');
			//$this->load->view('/nav/top_nav', $data);
			if ($this->session->userdata('role') == 'ens') {
				$this->load->view('ens/content');
			} else{
				$this->load->view('user/connexion');
			}
			$this->load->view('../common/footer');
			//$this->load->view('../views/dasbord/content');

            
	}

	// public function logout() {
	// 	$this->session->unset_userdata(array(
	// 		'login',
	// 		'password',
	// 		'role'
	// 		));
	
	// 		$this->session->sess_destroy();
    //     redirect ('Accueil/index');
    // }

    
}