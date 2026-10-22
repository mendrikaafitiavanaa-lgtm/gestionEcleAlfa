<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Affichercahiertexte extends CI_Controller{

    
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

            if ( $role == 'ens') {
               $this->load->view('ens/content',$data);
                $this->load->view('affichercahiertexte/layout',$data);
            }  else {
                redirect ('Accueil/index');
            }   
            
			$this->load->view('../common/footer');
    }


    function afficher_form(){  
        $login = $this->session->userdata('login');
        $password = $this->session->userdata('password');
        $role = $this->session->userdata('role');

        $idclasse = trim($this->input->post('idclasse',TRUE));
        $numtrimestre = trim($this->input->post('numtrimestre',TRUE));
        
        
        $data['liste_noteparcLassetrimestre'] = $this->Saisirnote_model->getNoteParCLasseTrimestre($idclasse, $numtrimestre);
        //$data['liste_eleveparclasses'] = $this->Eleve_model->getEleveParClasse($idclasse, $numtrimestre);

        $data['numtrimestre'] = $this->input->post('numtrimestre',TRUE);
        $data['idmatiere'] = $this->input->post('idmatiere',TRUE);

        // $data['liste_trimestres'] = $this->Trimestre_model->getNumTrimestre();
        // $data['liste_matieres'] = $this->Matiere_model->getIdMatiere();

      //var_dump( $data['liste_noteparcLassetrimestre']);die();
       // $data['liste_eleveparclasses'] = array('liste_eleveparclasses'=>$eleveparclasses);
       //var_dump($data['liste_eleveparclasses']);die();
		$this->load->view('../common/header');
       
        if ( $role == 'admin') {
           // $this->load->view('admin/content',$data);
            $this->load->view('Affichernote/form_affichernote',$data);
        }  else {
            redirect ('Accueil/index');
        }   
            
		$this->load->view('../common/footer');
    
    }

    
    
    function set_url($url) { echo("<script>history.replaceState({},'','$url');</script>"); }

}