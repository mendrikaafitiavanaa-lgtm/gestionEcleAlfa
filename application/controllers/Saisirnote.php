<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Saisirnote extends CI_Controller{

    
    function __construct ()
    {
        
        parent::__construct();
        $this->load->model('Saisirnote_model');
        $this->load->model('Trimestre_model');
        $this->load->model('Eleve_model');
        $this->load->model('Matiere_model');
        $this->load->model('Classe_model');

        $this->load->library('form_validation');
        $this->load->library('pagination');
        //$this->output->enable_profiler(TRUE);
        $this->lang->load('fr_admin_lang','french');
    }
    public function index() {
            $page = $this->uri->segment(4,0);
            
            $config['base_url'] = site_url().'/saisirnote/index/page';
            
            $config['per_page'] = '15';
            $config['uri_segment'] = 4;
            $saisirnotes = $this->Saisirnote_model->findAll($config['per_page'],$page);


            $config['prev_tag_open'] = '<div class="btn btn-default">';
            $config['prev_tag_close'] = '</div>';
            $config['next_tag_open'] = '<div class="btn btn-default">';
            $config['next_tag_close'] = '</div>';
            $config['cur_tag_open'] = '<div class="btn btn-default">';
            $config['cur_tag_close'] = '</div>';
            $config['num_tag_open'] = '<div class="btn btn-default">';
            $config['num_tag_close'] = '</div>';
            
            $config['total_rows'] = $this->Saisirnote_model->getCountTable();
            
            $data['context'] = 'list';
            
            $data['titre'] = 'Liste des Notes';
            $data['liste_saisirnotes'] = array('liste_saisirnotes'=>$saisirnotes);
            $data['liste_Classes'] = $this->Classe_model->getNumClasse();

            $data['liste_trimestres'] = $this->Trimestre_model->getNumTrimestre();
            $data['liste_matieres'] = $this->Matiere_model->getIdMatiere();

            $this->pagination->initialize($config);
            
            $login = $this->session->userdata('login');
            $password = $this->session->userdata('password');
            $role = $this->session->userdata('role');
    
			$this->load->view('../common/header');

            if ( $role == 'admin') {
                $this->load->view('admin/content',$data);
                $this->load->view('saisirnote/layout',$data);
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
        
        
        $data['liste_eleveparclasses'] = $this->Eleve_model->getEleveParClasse($idclasse);
        //$data['liste_eleveparclasses'] = $this->Eleve_model->getEleveParClasse($idclasse, $numtrimestre);

        $data['numtrimestre'] = $this->input->post('numtrimestre',TRUE);
        $data['idmatiere'] = $this->input->post('idmatiere',TRUE);

        // $data['liste_trimestres'] = $this->Trimestre_model->getNumTrimestre();
        // $data['liste_matieres'] = $this->Matiere_model->getIdMatiere();

    //   var_dump( $data['liste_eleveparclasses']);die();
       // $data['liste_eleveparclasses'] = array('liste_eleveparclasses'=>$eleveparclasses);
       //var_dump($data['liste_eleveparclasses']);die();
		$this->load->view('../common/header');
       
        if ( $role == 'admin') {
           // $this->load->view('admin/content',$data);
            $this->load->view('saisirnote/form_saisienote',$data);
        }  else {
            redirect ('Accueil/index');
        }   
            
		$this->load->view('../common/footer');
    
    }


    function insertionnote() {

        if(!empty($_POST['matricule']) && ($_POST['noteds'] >=0 && $_POST['noteds'] <= 20) && ($_POST['notecahier'] >=0 && $_POST['notecahier'] <= 20) && ($_POST['notecomportement'] >=0 && $_POST['notecomportement'] <= 20))
        {
            

           
            $numtrimestre = $_POST['numtrimestre'];
            $idmatiere = $_POST['idmatiere'];
            $matricule = $_POST['matricule'];
            $noteds = $_POST['noteds'];                
            $notecahier = $_POST['notecahier'];
            $notecomportement = $_POST['notecomportement'];

            $noteexiste = $this->Saisirnote_model->isNoteExists($numtrimestre, $matricule, $idmatiere);

            if ($noteexiste == false) {
                $insertionnote = $this->Saisirnote_model->insertionnote($numtrimestre,$matricule,$idmatiere,$noteds, $notecahier,$notecomportement);
               
            } else {
                $modifiernote = $this->Saisirnote_model->update($numtrimestre, $matricule, $idmatiere, $noteds, $notecahier, $notecomportement);
                
            }
           
           
           
           

        } 

    }
    
    
    function set_url($url) { echo("<script>history.replaceState({},'','$url');</script>"); }

}