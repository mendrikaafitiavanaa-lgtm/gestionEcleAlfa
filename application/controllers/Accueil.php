<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller{

    function __construct()
    {
        parent::__construct();
       // $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        //$this->output->enable_profiler(TRUE);
        $this->lang->load('fr_admin_lang','french');
    }
    


    public function index() {
			$page = $this->uri->segment(4,0);
			
						
			$data['context'] = 'list';			
			$data['titre'] = 'ALFA SCHOOL';
			
			$this->load->view('../common/header');
			$this->load->view('/nav/top_nav', $data);
			$this->load->view('/accueil/layout',$data);
            $this->load->view('../common/footer');
		
	}


}
?>