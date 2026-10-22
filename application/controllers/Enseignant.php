<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Enseignant extends CI_Controller{

	
	function __construct ()
	{
		
		parent::__construct();
		$this->load->model('Enseignant_model');
        
		$this->load->library('form_validation');
		$this->load->library('pagination');
		//$this->output->enable_profiler(TRUE);
        $this->lang->load('fr_admin_lang','french');
	}
	public function index() {
			$page = $this->uri->segment(4,0);
			
			$config['base_url'] = site_url().'/enseignant/index/page';
			
			$config['per_page'] = '5';
			$config['uri_segment'] = 4;
			$enseignants = $this->Enseignant_model->findAll($config['per_page'],$page);

			$config['first_link'] = 'Debut';
			$config['next_link'] = 'Suivant';
			$config['Last_link'] = 'Fin';
		    $config['prev_link'] = 'Précedent';

            $config['prev_tag_open'] = '<div class="btn btn-default">';
            $config['prev_tag_close'] = '</div>';
            $config['next_tag_open'] = '<div class="btn btn-default">';
            $config['next_tag_close'] = '</div>';
            $config['cur_tag_open'] = '<div class="btn btn-default">';
            $config['cur_tag_close'] = '</div>';
            $config['num_tag_open'] = '<div class="btn btn-default">';
            $config['num_tag_close'] = '</div>';
            
			$config['total_rows'] = $this->Enseignant_model->getCountTable();
			
			$data['context'] = 'list';
			
			$data['titre'] = 'Liste des enseignants';
			$data['liste_enseignant'] = $enseignants;
			//var_dump($data['liste_departements']);die();
			$this->pagination->initialize($config);
			

            $login = $this->session->userdata('login');
            $password = $this->session->userdata('password');
            $role = $this->session->userdata('role');
    
			$this->load->view('../common/header');

            if ( $role == 'admin') {
                $this->load->view('admin/content',$data);
                $this->load->view('enseignant/layout',$data);
            }  else {
                redirect ('Accueil/index');
            }   
            
			$this->load->view('../common/footer');
	}

	function show_add(){            
        $data['context'] = 'edit';
        $data['mode'] = 'add';
        $data['mode_titre'] = 'Ajouter';
        $data['titre'] = 'Liste de enseignants';
        $data['enseignant'] = array();
        //$data['id'] = '';
        
       
        $data['titre_edit'] = 'Ajouter un enseignant';

        
        $data['login'] = $this->session->userdata('LOGIN');
        $data['role'] = $this->session->userdata('ROLE');

        $this->load->view('../common/header');
        $this->load->view('admin/content',$data);
        $this->load->view('enseignant/layout',$data);
        $this->load->view('../common/footer');
    }

    function add(){         
        $this->setValidation();
       
        if ($this->form_validation->run() == FALSE)
        {
            $this->show_add();
        }
        else
        {
            $data['matrienseignant'] = $this->input->post('matrienseignant',TRUE);
            $data['nomenseignant'] = $this->input->post('nomenseignant',TRUE);
            $data['preenseignant'] = $this->input->post('preenseignant',TRUE);
            $data['naissenseignant'] = $this->input->post('naissenseignant',TRUE);
            $data['sexeenseignant'] = $this->input->post('sexeenseignant',TRUE);
            $data['mailenseignant'] = $this->input->post('mailenseignant',TRUE);
            $data['phoneenseignant'] = $this->input->post('phoneenseignant',TRUE);
            

       
            $this->Enseignant_model->add($data);
            $data['context'] = 'message';
            $data['titre'] = 'Saisie validée';

            $login = $this->session->userdata('login');
            $password = $this->session->userdata('password');
            $role = $this->session->userdata('role');
            
			$this->load->view('enseignant/layout',$data);
			
        }
    }

    function show_update($id=-1){
        if($id==-1)
        $id = $this->uri->segment(3,-1);
            
        $data['enseignant'] = array('enseignant'=> $this->Enseignant_model->find($id));
            
        $data['context'] = 'edit';
        $data['mode'] = 'update';
        $data['mode_titre'] = 'Modifier';
        $data['matrienseignant'] = $id;
        $data['titre'] = 'Liste des enseignants';
        $data['titre_edit'] = 'Modifier un enseignant';
        

        $data['uid'] = $this->session->userdata('ID_USER');
        $data['login'] = $this->session->userdata('LOGIN');
        $data['role'] = $this->session->userdata('ROLE');
    

        $this->load->view('../common/header');
        $this->load->view('admin/content',$data);
		$this->load->view('enseignant/layout',$data);
		$this->load->view('../common/footer');
    } 

    function update(){            
      
        $data['matrienseignant'] = $this->input->post('matrienseignant',TRUE);
        $data['nomenseignant'] = $this->input->post('nomenseignant',TRUE);
        $data['preenseignant'] = $this->input->post('preenseignant',TRUE);
        $data['naissenseignant'] = $this->input->post('naissenseignant',TRUE);
        $data['sexeenseignant'] = $this->input->post('sexeenseignant',TRUE);
        $data['mailenseignant'] = $this->input->post('mailenseignant',TRUE);
        $data['phoneenseignant'] = $this->input->post('phoneenseignant',TRUE);  

            $this->setValidation();
            if ($this->form_validation->run() == FALSE)
            {
                $this->show_update($data['matrienseignant']);
            }
            else
            {
               $this->Enseignant_model->update($data['matrienseignant'],$data);
               $data['titre'] = 'Saisie validée';
               $data['context'] = 'message';
               $data['uid'] = $this->session->userdata('ID_USER');
               $data['login'] = $this->session->userdata('LOGIN');
               $data['role'] = $this->session->userdata('ROLE');
       
               $this->load->view('../common/header');
               $this->load->view('admin/content',$data);
               $this->load->view('enseignant/layout',$data);
               $this->load->view('../common/footer');
            }
            
    } 

    function delete()
    {
          $id= $this->uri->segment(3,-1);
          $this->Enseignant_model->delete($id);
          $data['context']= 'message';
          
          $data['uid'] = $this->session->userdata('ID_USER');
          $data['login'] = $this->session->userdata('LOGIN');
          $data['role'] = $this->session->userdata('ROLE');
  
          $this->load->view('../common/header');
          $this->load->view('admin/content',$data);
          $this->load->view('enseignant/layout',$data);
          $this->load->view('../common/footer');
      
      
    }

    function suppression($id = NULL)
    {
        
            $this->load->helper('form');
        
            if( $this->input->is_ajax_request()){
                $this->load->view('enseignant/delete_confirm');
            
            }else{
                if( $this->input->post('confirm') === NULL){
                    $data['action'] = "confirm";
                
                }else{
                    $this->delete();
                    $data['action'] = "result";
                }

                $data['title'] = "Suppression enseignant";

                $data['uid'] = $this->session->userdata('ID_USER');
                $data['login'] = $this->session->userdata('LOGIN');
                $data['role'] = $this->session->userdata('ROLE');

                $this->load->view('../common/header',$data);
                $this->load->view('enseignant/delete',$data);
                $this->load->view('../common/footer',$data);
            }
    }

    function setValidation() {           
        $this->form_validation->set_rules('matrienseignant', 'Matricule', 'required');
       
    }
    

    function set_url($url) {
        echo("<script>history.replaceState({}, '','$url');</script>");
    }
}