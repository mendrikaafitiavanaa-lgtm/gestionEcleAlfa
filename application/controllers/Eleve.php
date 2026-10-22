<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Eleve extends CI_Controller{

	
	function __construct ()
	{
		
		parent::__construct();
		$this->load->model('Eleve_model');
        $this->load->model('Classe_model');
		$this->load->library('form_validation');
		$this->load->library('pagination');
		//$this->output->enable_profiler(TRUE);
        $this->lang->load('fr_admin_lang','french');
	}
	public function index() {
			$page = $this->uri->segment(4,0);
			
			$config['base_url'] = site_url().'/eleve/index/page';
			
			$config['per_page'] = '5';
			$config['uri_segment'] = 4;
			$eleves = $this->Eleve_model->findAll($config['per_page'],$page);

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
            
			$config['total_rows'] = $this->Eleve_model->getCountTable();
			
			$data['context'] = 'list';
			
			$data['titre'] = 'Liste des eleves';
            $data['liste_eleves'] = array('liste_eleves'=> $eleves);
			//var_dump($data['liste_eleves']);die();
			$this->pagination->initialize($config);
			

            $login = $this->session->userdata('login');
            $password = $this->session->userdata('password');
            $role = $this->session->userdata('role');
    
			$this->load->view('../common/header');

            if ( $role == 'admin') {
                $this->load->view('admin/content',$data);
                $this->load->view('eleve/layout',$data);
            }  else {
                redirect ('Accueil/index');
            }   
            
			$this->load->view('../common/footer');
	}

	function show_add(){            
        $data['context'] = 'edit';
        $data['mode'] = 'add';
        $data['mode_titre'] = 'Ajouter';
        $data['titre'] = 'Liste de eleves';
        $data['eleve'] = array();
        //$data['id'] = '';
        
        $data['liste_Classes'] = $this->Classe_model->getNumClasse();
        $data['titre_edit'] = 'Ajouter un eleve';

        
        $login = $this->session->userdata('login');
        $password = $this->session->userdata('password');
        $role = $this->session->userdata('role');

        $this->load->view('../common/header');
        $this->load->view('admin/content',$data);
        $this->load->view('eleve/layout',$data);
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
            $data['matricule'] = $this->input->post('matricule',TRUE);
            $data['numerodeclasse'] = $this->input->post('numerodeclasse',TRUE);
            $data['nom'] = $this->input->post('nom',TRUE);
            $data['prenom'] = $this->input->post('prenom',TRUE);
            $data['naiss'] = $this->input->post('naiss',TRUE);
            $data['sexe'] = $this->input->post('sexe',TRUE);
            $data['mail'] = $this->input->post('mail',TRUE);
            $data['phone'] = $this->input->post('phone',TRUE);
            $data['idclasse'] = $this->input->post('idclasse', TRUE);

       
            $this->Eleve_model->add($data);
            $data['context'] = 'message';
            $data['titre'] = 'Saisie validée';
            
			$this->load->view('eleve/layout',$data);
			
        }
    }

    function show_update($id=-1){
        if($id==-1)
        $id = $this->uri->segment(3,-1);
            
        $data['eleve'] = array('eleve'=> $this->Eleve_model->find($id));
            
        $data['context'] = 'edit';
        $data['mode'] = 'update';
        $data['mode_titre'] = 'Modifier';
        $data['numMatiere'] = $id;
        $data['titre'] = 'Liste des eleves';
        $data['titre_edit'] = 'Modifier un eleve';
        $data['liste_Classes'] = $this->Classe_model->getNumClasse();

        $login = $this->session->userdata('login');
        $password = $this->session->userdata('password');
        $role = $this->session->userdata('role');
    

        $this->load->view('../common/header');
        $this->load->view('admin/content',$data);
		$this->load->view('eleve/layout',$data);
		$this->load->view('../common/footer');
    } 

    function update(){            
      
        $data['matricule'] = $this->input->post('matricule',TRUE);
        $data['numerodeclasse'] = $this->input->post('numerodeclasse',TRUE);
        $data['nom'] = $this->input->post('nom',TRUE);
        $data['prenom'] = $this->input->post('prenom',TRUE);
        $data['naiss'] = $this->input->post('naiss',TRUE);
        $data['sexe'] = $this->input->post('sexe',TRUE);
        $data['mail'] = $this->input->post('mail',TRUE);
        $data['phone'] = $this->input->post('phone',TRUE);
        
       

        $data['idclasse'] = $this->input->post('idclasse', TRUE);
        

            $this->setValidation();
            if ($this->form_validation->run() == FALSE)
            {
                $this->show_update($data['matricule']);
            }
            else
            {
               $this->Eleve_model->update($data['matricule'],$data);
               $data['titre'] = 'Saisie validée';
               $data['context'] = 'message';

                $login = $this->session->userdata('login');
                $password = $this->session->userdata('password');
                $role = $this->session->userdata('role');
       
               $this->load->view('../common/header');
               $this->load->view('admin/content',$data);
               $this->load->view('eleve/layout',$data);
               $this->load->view('../common/footer');
            }
            
    } 

    function delete()
    {
          $id= $this->uri->segment(3,-1);
          $this->Eleve_model->delete($id);
          $data['context']= 'message';
          
          $login = $this->session->userdata('login');
          $password = $this->session->userdata('password');
          $role = $this->session->userdata('role');
  
          $this->load->view('../common/header');
          $this->load->view('admin/content',$data);
          $this->load->view('eleve/layout',$data);
          $this->load->view('../common/footer');
      
      
    }

    function suppression($id = NULL)
    {
        
            $this->load->helper('form');
        
            if( $this->input->is_ajax_request()){
                $this->load->view('eleve/delete_confirm');
            
            }else{
                if( $this->input->post('confirm') === NULL){
                    $data['action'] = "confirm";
                
                }else{
                    $this->delete();
                    $data['action'] = "result";
                }

                $data['title'] = "Suppression eleve";

                $data['uid'] = $this->session->userdata('ID_USER');
                $data['login'] = $this->session->userdata('LOGIN');
                $data['role'] = $this->session->userdata('ROLE');

                $this->load->view('../common/header',$data);
                $this->load->view('eleve/delete',$data);
                $this->load->view('../common/footer',$data);
            }
    }

    function setValidation() {           
        $this->form_validation->set_rules('matricule', 'Matricule', 'required');
       
    }
    

    function set_url($url) {
        echo("<script>history.replaceState({}, '','$url');</script>");
    }
}