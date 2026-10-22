<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Saisircahiertexte extends CI_Controller{

    
    function __construct ()
    {
        
        parent::__construct();
        $this->load->model('Saisircahiertexte_model');
        $this->load->model('Trimestre_model');
        $this->load->model('Eleve_model');
        $this->load->model('Matiere_model');
        $this->load->model('Classe_model');
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

            $data['enseignant'] = $this->Enseignant_model->find($login);
            //var_dump($data['enseignant']);die();
    
			$this->load->view('../common/header');

            if ( $role == 'ens') {
                $this->load->view('ens/content',$data);
                $this->load->view('saisircahiertexte/layout',$data);
            }  else {
                redirect ('Accueil/index');
            }   
            
			$this->load->view('../common/footer');
    }

    function afficher_form(){  
        $login = $this->session->userdata('login');
        $password = $this->session->userdata('password');
        $role = $this->session->userdata('role');

        $data['matrienseignant'] = trim($this->input->post('matrienseignant',TRUE));
        $data['idclasse'] = trim($this->input->post('idclasse',TRUE));
        
        
        //$data['liste_eleveparclasses'] = $this->Eleve_model->getEleveParClasse($idclasse);
        //$data['liste_eleveparclasses'] = $this->Eleve_model->getEleveParClasse($idclasse, $numtrimestre);

        $data['idmatiere'] = $this->input->post('idmatiere',TRUE);
        $data['datecours'] = $this->input->post('datecours',TRUE);

        // $data['liste_trimestres'] = $this->Trimestre_model->getNumTrimestre();
        // $data['liste_matieres'] = $this->Matiere_model->getIdMatiere();

    //   var_dump( $data['liste_eleveparclasses']);die();
       // $data['liste_eleveparclasses'] = array('liste_eleveparclasses'=>$eleveparclasses);
       //var_dump($data['liste_eleveparclasses']);die();
		$this->load->view('../common/header');
       
        if ( $role == 'ens') {
           // $this->load->view('admin/content',$data);
            $this->load->view('saisircahiertexte/form_saisiecahiertexte',$data);
        }  else {
            redirect ('Accueil/index');
        }   
            
		$this->load->view('../common/footer');
    
    }

    function add(){    
        $login = $this->session->userdata('login');
        $password = $this->session->userdata('password');
        $role = $this->session->userdata('role');
        
        
        $this->setValidation();
       // var_dump($this->form_validation->run() );die();
       
        if ($this->form_validation->run() == FALSE)
        {
            $this->afficher_form();
        }
        else
        {
            $data['matrienseignant'] = $this->input->post('matrienseignant',TRUE);
            $data['idclasse'] = $this->input->post('idclasse',TRUE);
            $data['idmatiere'] = $this->input->post('idmatiere',TRUE);
            $data['datecours'] = strftime("%Y-%m-%d",strtotime($this->input->post('datecours',TRUE)));
            $data['heuredebut'] = $this->input->post('heuredebut',TRUE);
            $data['heurefin'] = $this->input->post('heurefin',TRUE);
            $data['titre'] = $this->input->post('titre',TRUE);
            $data['contenu'] = $this->input->post('contenu',TRUE);
            $data['travailafaire'] = $this->input->post('travailafaire', TRUE);

            $matrienseignant = $this->input->post('matrienseignant',TRUE);
            $idclasse = $this->input->post('idclasse',TRUE);
            $idmatiere = $this->input->post('idmatiere',TRUE);
            $datecours = $this->input->post('datecours',TRUE);
            $heuredebut = $this->input->post('heuredebut',TRUE);
            $heurefin = $this->input->post('heurefin',TRUE);
            $titre = $this->input->post('titre',TRUE);
            $contenu = $this->input->post('contenu',TRUE);
            $travailafaire = $this->input->post('travailafaire', TRUE);


            // var_dump($data['matrienseignant'] );die();
            $cahiertexteexists = $this->Saisircahiertexte_model->isCahierTexteExists($matrienseignant, $idclasse, $idmatiere, $datecours);
            
            if ($cahiertexteexists == false) {
                $this->Saisircahiertexte_model->add($data);
            } else {
                $this->Saisircahiertexte_model->update($matrienseignant, $idclasse, $idmatiere, $datecours, $heuredebut, $heurefin,  $titre, $contenu, $travailafaire);
            }
           
            // $data['context'] = 'message';
            // $data['titre'] = 'Saisie validée';
            $this->load->view('../common/header');
            
			if ( $role == 'ens') {
                // $this->load->view('admin/content',$data);
                // $this->load->view('saisircahiertexte/form_saisiecahiertexte',$data);
                redirect ('Saisircahiertexte/index');
             }  else {
                 redirect ('Accueil/index');
             }   
                 
             $this->load->view('../common/footer');
			
        }
    }

    function update(){    
        $login = $this->session->userdata('login');
        $password = $this->session->userdata('password');
        $role = $this->session->userdata('role');

        $matrienseignant = $this->uri->segment(3, -1); 
        $idclasse = $this->uri->segment(4, -1); 
        $idmatiere = $this->uri->segment(5, -1); 
        $datecours = $this->uri->segment(6, -1); 

        $data['cahiertexte'] = array('cahiertexte'=>$this->Saisircahiertexte_model->find($matrienseignant, $idclasse, $idmatiere, $datecours));
        
        //var_dump($data['cahiertexte']);die();
       
        $data['matrienseignant'] = $this->uri->segment(3, -1); 
        $data['idclasse'] = $this->uri->segment(4, -1); 
        $data['idmatiere'] = $this->uri->segment(5, -1); 
        $data['datecours'] = $this->uri->segment(6, -1); 


            
        $this->load->view('../common/header');
			if ( $role == 'ens') {
                // $this->load->view('admin/content',$data);
                $this->load->view('saisircahiertexte/form_saisiecahiertexteediter',$data);
             }  else {
                 redirect ('Accueil/index');
             }   
                 
        $this->load->view('../common/footer');
			
        
    }


  function delete()
  {
    $login = $this->session->userdata('login');
    $password = $this->session->userdata('password');
    $role = $this->session->userdata('role');

    $matrienseignant = $this->uri->segment(3, -1); 
    $idclasse = $this->uri->segment(4, -1); 
    $idmatiere = $this->uri->segment(5, -1); 
    $datecours = $this->uri->segment(6, -1); 

    $this->Saisircahiertexte_model->delete($matrienseignant, $idclasse, $idmatiere, $datecours);
    $data['context']= 'message';
        
    
    
    $this->load->view('../common/header');
    
    if ( $role == 'ens') {
        $this->load->view('ens/content',$data);
        //$this->load->view('saisircahiertexte/content',$data);
        redirect ('Affichercahiertexte/index');
    }  else {
        redirect ('Accueil/index');
    } 
    $this->load->view('../common/footer');


  }
  
//   function suppression($id = NULL)
//   {
//       $this->load->helper('form');
      
//       if( $this->input->is_ajax_request()){
//           $this->load->view('saisircahiertexte/delete_confirm');
        
//       }else{
//           if( $this->input->post('confirm') === NULL){
//                 $data['action'] = "confirm";
            
//           }else{
//             $this->delete();
//             $data['action'] = "result";
//           }
//           $data['title'] = "Suppression ";

//          $this->load->view('../common/header',$data);
//          $this->load->view('saisircahiertexte/delete',$data);
//          $this->load->view('../common/footer',$data);
//       }
// }
    
    
    function setValidation()
    {
        $this->form_validation->set_rules('matrienseignant','matricule','required');   
        
    }
    function set_url($url) { echo("<script>history.replaceState({},'','$url');</script>"); }

}