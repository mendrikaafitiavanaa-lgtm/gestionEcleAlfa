<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

	
	function __construct ()
	{
		
		parent::__construct();
		$this->load->model('User_model');
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->lang->load('fr_admin_lang','french');
	}
	public function index() {

			$this->load->view('../common/header');
			//$this->load->view('/nav/top_nav', $data);
			$this->load->view('user/connexion');
			$this->load->view('../common/footer');

            $this->setValidationConnect();

             if ($this->form_validation->run() )
            {

                $login = $this->input->post('login');
                $password = $this->input->post('password');



                $ret = array();

                $user_record = $this->User_model->check_login($login, $password);

                if($user_record){
                    $this->session->set_userdata ('login', $user_record->login);
                    $this->session->set_userdata ('password', $user_record->password);
                    $this->session->set_userdata ('role', $user_record->role);
                    $ret ['result'] = 'OK';
                    
                }else{
                    $ret ['result'] = 'NON OK';
                    
                }
               

            
                 if($ret['result'] == 'OK'){
                    if ($this->session->userdata('role') == 'admin'){
                        redirect ('Admin/index');
                       echo("ok");
                    } elseif($this->session->userdata('role') == 'ens'){
                        redirect ('Ens/index');
                    }   elseif($this->session->userdata('role') == 'ele'){
                        redirect ('Ele/index');
                    }
                    else{
                       redirect ('Accueil/index');
                       
                    }
                 }

            } 

	}

	public function logout() {
        $this->session->unset_userdata(array(
			'login',
			'password',
			'role'
			));
	
			$this->session->sess_destroy();
        redirect ('Accueil/index');
    }

    function setValidation() {           
		
		$this->form_validation->set_rules('id_user', 'id user', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('role', 'role', 'required');
		
    }

    function setValidationConnect() {           
        
        $this->form_validation->set_rules('login', 'login', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
                
    }
}