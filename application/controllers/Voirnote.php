<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Voirnote extends CI_Controller{

    
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
            
            $config['base_url'] = site_url().'/affichernote/index/page';
            
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
            $data['liste_affichernotes'] = array('liste_affichernotes'=>$saisirnotes);
            $data['liste_Classes'] = $this->Classe_model->getNumClasse();

            $data['liste_trimestres'] = $this->Trimestre_model->getNumTrimestre();
            $data['liste_matieres'] = $this->Matiere_model->getIdMatiere();

            $this->pagination->initialize($config);
            
            $login = $this->session->userdata('login');
            $password = $this->session->userdata('password');
            $role = $this->session->userdata('role');

            $eleve = $this->Eleve_model->find($login);
            //var_dump( $eleve);die();

            //$data['notes'] = $this->Saisirnote_model->getRangParMatriTrimestre($matricule, $numtrimestre);

			$this->load->view('../common/header');

            if ( $role == 'ele') {
                $this->load->view('ele/content',$data);
                $this->load->view('voirnote/layout',$data);
            }  else {
                redirect ('Accueil/index');
            }   
            
			$this->load->view('../common/footer');
    }


    function afficher_note(){  

        $login = $this->session->userdata('login');
        $password = $this->session->userdata('password');
        $role = $this->session->userdata('role');

        $data['context'] = 'detailnote';
        //$data['mode'] = 'update';
        $data['mode_titre'] = 'Detail Note';
        //$data['numbulletin'] = $numbulletin;
        $data['titre'] = 'Detail Note';
        $data['titre_edit'] = 'Bulletin de Note';

        //$idclasse = trim($this->input->post('idclasse',TRUE));
        $numtrimestre = trim($this->input->post('numtrimestre',TRUE));
        
        
        //$data['liste_noteparcLassetrimestre'] = $this->Saisirnote_model->getNoteParCLasseTrimestre($idclasse, $numtrimestre);
        //$data['liste_eleveparclasses'] = $this->Eleve_model->getEleveParClasse($idclasse, $numtrimestre);

        $data['numtrimestre'] = $this->input->post('numtrimestre',TRUE);
        //$data['idmatiere'] = $this->input->post('idmatiere',TRUE);

        // $data['liste_trimestres'] = $this->Trimestre_model->getNumTrimestre();
        // $data['liste_matieres'] = $this->Matiere_model->getIdMatiere();

      //var_dump( $data['liste_noteparcLassetrimestre']);die();
       // $data['liste_eleveparclasses'] = array('liste_eleveparclasses'=>$eleveparclasses);
       //var_dump($data['liste_eleveparclasses']);die();

       $eleve = $this->Eleve_model->find($login);
       $data['eleve'] = $this->Eleve_model->find($eleve->matricule);

       $data['listenotes'] = $this->Saisirnote_model->getNoteParMatriTrimestre($eleve->matricule, $numtrimestre );
       //var_dump($data['listenotes']); die();

       $data['trimestre'] = $this->Saisirnote_model->getMoyenneParMatriTrimestre($eleve->matricule, $numtrimestre);
       $data['rangtrimestre'] = $this->Saisirnote_model->getRangParMatriTrimestre($eleve->matricule, $numtrimestre);



		$this->load->view('../common/header');
       
        if ( $role == 'ele') {
           // $this->load->view('admin/content',$data);
            $this->load->view('voirnote/form_detailnote',$data);
        }  else {
            redirect ('Accueil/index');
        }   
            
		$this->load->view('../common/footer');
    
    }

    public function detailnote() {

        $numtrimestre = $this->uri->segment(3,-1);
        $matricule = $this->uri->segment(4,-1);
        
        $data['context'] = 'detailnote';
        //$data['mode'] = 'update';
        $data['mode_titre'] = 'Detail Note';
        //$data['numbulletin'] = $numbulletin;
        $data['titre'] = 'Detail Note';
        $data['titre_edit'] = 'Bulletin de Note';
        
        $data['numtrimestre'] = $numtrimestre;
        $data['eleve'] = $this->Eleve_model->find($matricule);

        $data['listenotes'] = $this->Saisirnote_model->getNoteParMatriTrimestre($matricule, $numtrimestre );
        //var_dump($data['listenotes']); die();

        $data['trimestre'] = $this->Saisirnote_model->getMoyenneParMatriTrimestre($matricule, $numtrimestre);
        $data['rangtrimestre'] = $this->Saisirnote_model->getRangParMatriTrimestre($matricule, $numtrimestre);
        //var_dump($data['trimestre']); die();
        // $idclasse = $eleve->idclasse;
        // $data['rangparnotes'] = $this->Bulletmat_model->rangparnote($anneescol, $numtrimestre, $idsection, $idclasse);
        // //var_dump($data['rangparnotes']); die();
        // $data['rangparmoys'] = $this->Bulletmat_model->rangparmoy($anneescol, $numtrimestre, $idclasse, $idsection);
        // // var_dump($data['rangparmoys']); die();
        // $idclasse =  $this->Eleve_model->find($matricule);

        // $data['effectif'] = $this->Eleve_model->geteffectif($idclasse->idclasse);
       

        $login = $this->session->userdata('login');
        $password = $this->session->userdata('password');
        $role = $this->session->userdata('role');

        $this->load->view('../common/header');
       
        if ( $role == 'admin') {
           // $this->load->view('admin/content',$data);
            $this->load->view('Affichernote/form_detailnote',$data);
        }  else {
            redirect ('Accueil/index');
        }   
            
		$this->load->view('../common/footer');
            
            
    }    
    
    
    function set_url($url) { echo("<script>history.replaceState({},'','$url');</script>"); }

}