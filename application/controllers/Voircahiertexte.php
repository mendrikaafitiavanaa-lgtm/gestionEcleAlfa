<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Voircahiertexte extends CI_Controller{

    
    function __construct ()
    {
        
        parent::__construct();
        $this->load->model('Saisirnote_model');
        $this->load->model('Trimestre_model');
        $this->load->model('Eleve_model');
        $this->load->model('Matiere_model');
        $this->load->model('Classe_model');
        $this->load->model('Saisircahiertexte_model');
        $this->load->model('Enseignant_model');

        $this->load->library('form_validation');
        $this->load->library('pagination');
        //$this->output->enable_profiler(TRUE);
        $this->lang->load('fr_admin_lang','french');
    }
    public function index() {
        $page = $this->uri->segment(4,0);
            
        $config['base_url'] = site_url().'/saisircahiertexte/index/page';
        
        $config['per_page'] = '15';
        $config['uri_segment'] = 4;
        $saisircahiertextes = $this->Saisircahiertexte_model->findAll($config['per_page'],$page);


        $config['prev_tag_open'] = '<div class="btn btn-default">';
        $config['prev_tag_close'] = '</div>';
        $config['next_tag_open'] = '<div class="btn btn-default">';
        $config['next_tag_close'] = '</div>';
        $config['cur_tag_open'] = '<div class="btn btn-default">';
        $config['cur_tag_close'] = '</div>';
        $config['num_tag_open'] = '<div class="btn btn-default">';
        $config['num_tag_close'] = '</div>';
        
        $config['total_rows'] = $this->Saisircahiertexte_model->getCountTable();
        
        $data['context'] = 'list';
        
        $data['titre'] = 'Liste des Cahier de Texte';
        $data['liste_saisircahiertextes'] = array('liste_saisircahiertextes'=>$saisircahiertextes);
        $data['liste_Classes'] = $this->Classe_model->getNumClasse();

        $data['liste_enseignants'] = $this->Enseignant_model->getNumEnseignant();
        $data['liste_matieres'] = $this->Matiere_model->getIdMatiere();

        $this->pagination->initialize($config);
        
        $login = $this->session->userdata('login');
        $password = $this->session->userdata('password');
        $role = $this->session->userdata('role');

        $enseignant = $this->Enseignant_model->find($login);

        //var_dump( $enseignant);die();
        $data['cahiers'] = $this->Saisircahiertexte_model->getCahierTexteParEnseignant($enseignant->matrienseignant);
        
			$this->load->view('../common/header');

            if ( $role == 'ele') {
               $this->load->view('ele/content',$data);
                $this->load->view('voircahiertexte/layout',$data);
            }  else {
                redirect ('Accueil/index');
            }   
            
			$this->load->view('../common/footer');
    }


    function affichercahiertexte(){  
        $login = $this->session->userdata('login');
        $password = $this->session->userdata('password');
        $role = $this->session->userdata('role');

        $data['datecours'] = $this->input->post('datecours',TRUE);
        $datecours = $this->input->post('datecours',TRUE);
        
        $data['cahiers'] = $this->Saisircahiertexte_model->getCahierTexteParDate($datecours);
        //var_dump($data['cahiers']);die();
        
       $this->load->view('../common/header');

       if ( $role == 'ele') {
          $this->load->view('ele/content',$data);
           $this->load->view('voircahiertexte/form_cahiertexte',$data);
       }  else {
           redirect ('Accueil/index');
       }   
       
       $this->load->view('../common/footer');
    
    }

    
    
    function set_url($url) { echo("<script>history.replaceState({},'','$url');</script>"); }

}