<?php
Class Matiere extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Matiere_model');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        //$this->output->enable_profiler(TRUE);
        $this->lang->load('fr_admin_lang','french');
    }

    public function index() { 
        $page = $this->uri->segment(4,0);

        $config['base_url'] = site_url().'/matiere/index/page';
        //var_dump($config['base_url']);

        $config['per_page'] = '5';
        $config['uri_segment'] = 4;
        $matiere = $this->Matiere_model->findAll($config['per_page'], $page );
        

        $config['first_link'] = 'Début';
        $config['next_link'] = 'Suivant';
        $config['prev_link'] = 'Précédent';
        $config['last_link'] = 'Fin';

        $config['prev_tag_open'] = '<div class="btn btn-default">';
        $config['prev_tag_close'] = '</div>';
        $config['next_tag_open'] = '<div class="btn btn-default">';
        $config['next_tag_close'] = '</div>';
        $config['cur_tag_open'] = '<div class="btn btn-default">';
        $config['cur_tag_close'] = '</div>';
        $config['num_tag_open'] = '<div class="btn btn-default">';
        $config['num_tag_close'] = '</div>';

        $config['total_rows'] = $this->Matiere_model->getCountTable();

        $data['context'] = 'list';
        $data['titre'] = 'Liste de matiere';
        $data['liste_matieres'] = array('liste_matieres'=> $matiere);

        $this->pagination->initialize($config);
        //var_dump($data['liste_classes']);

        $login = $this->session->userdata('login');
        $password = $this->session->userdata('password');
        $role = $this->session->userdata('role');


        $this->load->view('../common/header');

        if ( $role == 'admin') {
            $this->load->view('admin/content',$data);
            $this->load->view('matiere/layout',$data);
        }  else {
            redirect ('Accueil/index');
        }   

        $this->load->view('../common/footer');

    }

    function show_add(){
        $data['context']='edit';
        $data['mode']='add';
        $data['mode_titre']='Ajouter';
        $data['titre']='Liste des matieres';
        $data['matiere']=array();
        
        $data['titre_edit']='Ajouter une matiere';

        $login = $this->session->userdata('login');
        $password = $this->session->userdata('password');
        $role = $this->session->userdata('role');
        
        $this->load->view('../common/header');
        $this->load->view('admin/content',$data);
        $this->load->view('matiere/layout',$data);
        $this->load->view('../common/footer');
    }

    function add(){
        $this->setValidation();
        
        if($this->form_validation->run() == FALSE){
            $this->show_add();
        }
        else{
            $data['idmatiere']= $this->input->post('idmatiere',TRUE);
            $data['nommatiere']= $this->input->post('nommatiere',TRUE);
            
            
            $this->Matiere_model->add($data);
            $data['context']= 'message';
            $data['titre']= 'Saisie validé"';

            $login = $this->session->userdata('login');
            $password = $this->session->userdata('password');
            $role = $this->session->userdata('role');

            $this->load->view('matiere/layout',$data);

            
        }
  }
  
  function show_update($id=-1){
        if($id==-1)
        $id= $this->uri->segment(3,-1);
        $data['matiere'] = array('matiere'=>$this->Matiere_model->find($id));

        $data['context'] = 'edit';
        $data['mode'] = 'update';
        $data['mode_titre'] = 'Modifier';
        $data['idmatiere'] = $id;
        $data['titre'] = 'Liste des matieres';
        $data['titre_edit'] = 'Modifier une matiere';

        $login = $this->session->userdata('login');
        $password = $this->session->userdata('password');
        $role = $this->session->userdata('role');
        
        $this->load->view('../common/header');
        $this->load->view('admin/content',$data);
        $this->load->view('Matiere/layout',$data);
        $this->load->view('../common/footer');

  }

  function update()
  {
    $data['idmatiere']= $this->input->post('idmatiere',TRUE);
    $data['nommatiere']= $this->input->post('nommatiere',TRUE);
  
      $this->setValidation();
      if($this->form_validation->run() == FALSE)
      {
          $this->show_update($data['idmatiere']);
      }  
      else{
          $this->Matiere_model->update($data['idmatiere'], $data);
          $data['titre']= 'Saisie validée';
          $data['context']= 'message';

          $login = $this->session->userdata('login');
          $password = $this->session->userdata('password');
          $role = $this->session->userdata('role');
  
          $this->load->view('../common/header');
          $this->load->view('admin/content',$data);
          $this->load->view('matiere/layout',$data);
          $this->load->view('../common/footer');
      }
  }
  

  function delete()
  {
    $id= $this->uri->segment(3,-1);
    $this->Matiere_model->delete($id);
    $data['context']= 'message';
        
    $login = $this->session->userdata('login');
    $password = $this->session->userdata('password');
    $role = $this->session->userdata('role');
    
    $this->load->view('../common/header');
    $this->load->view('admin/content',$data);
    $this->load->view('matiere/layout',$data);
    $this->load->view('../common/footer');


  }
  
  function suppression($id = NULL)
  {
      $this->load->helper('form');
      
      if( $this->input->is_ajax_request()){
          $this->load->view('matiere/delete_confirm');
        
      }else{
          if( $this->input->post('confirm') === NULL){
                $data['action'] = "confirm";
            
          }else{
            $this->delete();
            $data['action'] = "result";
          }
          $data['title'] = "Suppression Matiere";

          $this->load->view('../common/header',$data);
          $this->load->view('matiere/delete',$data);
          $this->load->view('../common/footer',$data);
      }
}

  function setValidation()
  {
      $this->form_validation->set_rules('idmatiere','Id Matiere','required');   
    
  }



  
}
?>