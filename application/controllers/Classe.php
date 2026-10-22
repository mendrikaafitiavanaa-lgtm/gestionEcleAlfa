<?php
Class Classe extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Classe_model');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        //$this->output->enable_profiler(TRUE);
        $this->lang->load('fr_admin_lang','french');
    }

    public function index() { 
        $page = $this->uri->segment(4,0);

        $config['base_url'] = site_url().'/classe/index/page';
        //var_dump($config['base_url']);

        $config['per_page'] = '5';
        $config['uri_segment'] = 4;
        $classes = $this->Classe_model->findAll($config['per_page'], $page );
        

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

        $config['total_rows'] = $this->Classe_model->getCountTable();

        $data['context'] = 'list';
        $data['titre'] = 'Liste de classe';
        $data['liste_classes'] = array('liste_classes'=> $classes);

        $this->pagination->initialize($config);
        //var_dump($data['liste_classes']);

        $login = $this->session->userdata('login');
        $password = $this->session->userdata('password');
        $role = $this->session->userdata('role');


        $this->load->view('../common/header');

        if ( $role == 'admin') {
            $this->load->view('admin/content',$data);
            $this->load->view('classe/layout',$data);
        }  else {
            redirect ('Accueil/index');
        }   

        $this->load->view('../common/footer');

    }

    function show_add(){
        $data['context']='edit';
        $data['mode']='add';
        $data['mode_titre']='Ajouter';
        $data['titre']='Liste des classes';
        $data['classe']=array();
        
        $data['titre_edit']='Ajouter une classe';

        $login = $this->session->userdata('login');
        $password = $this->session->userdata('password');
        $role = $this->session->userdata('role');
        
        $this->load->view('../common/header');
        $this->load->view('admin/content',$data);
        $this->load->view('classe/layout',$data);
        $this->load->view('../common/footer');
    }

    function add(){
        $this->setValidation();
        
        if($this->form_validation->run() == FALSE){
            $this->show_add();
        }
        else{
            $data['idclasse']= $this->input->post('idclasse',TRUE);
            $data['libclasse']= $this->input->post('libclasse',TRUE);
            
            
            $this->Classe_model->add($data);
            $data['context']= 'message';
            $data['titre']= 'Saisie validé"';

            $login = $this->session->userdata('login');
            $password = $this->session->userdata('password');
            $role = $this->session->userdata('role');

            $this->load->view('classe/layout',$data);

            
        }
  }
  
  function show_update($id=-1){
        if($id==-1)
        $id= $this->uri->segment(3,-1);
        $data['classe'] = array('classe'=>$this->Classe_model->find($id));

        $data['context'] = 'edit';
        $data['mode'] = 'update';
        $data['mode_titre'] = 'Modifier';
        $data['numClasse'] = $id;
        $data['titre'] = 'Liste des classes';
        $data['titre_edit'] = 'Modifier une classe';

        $login = $this->session->userdata('login');
        $password = $this->session->userdata('password');
        $role = $this->session->userdata('role');
        
        $this->load->view('../common/header');
        $this->load->view('admin/content',$data);
        $this->load->view('classe/layout',$data);
        $this->load->view('../common/footer');

  }

  function update()
  {
      $data['idclasse']= $this->input->post('idclasse',TRUE);
      $data['libclasse']= $this->input->post('libclasse',TRUE);
  
      $this->setValidation();
      if($this->form_validation->run() == FALSE)
      {
          $this->show_update($data['idclasse']);
      }  
      else{
          $this->Classe_model->update($data['idclasse'], $data);
          $data['titre']= 'Saisie validée';
          $data['context']= 'message';

          $login = $this->session->userdata('login');
          $password = $this->session->userdata('password');
          $role = $this->session->userdata('role');
  
          $this->load->view('../common/header');
          $this->load->view('admin/content',$data);
          $this->load->view('classe/layout',$data);
          $this->load->view('../common/footer');
      }
  }
  

  function delete()
  {
    $id= $this->uri->segment(3,-1);
    $this->Classe_model->delete($id);
    $data['context']= 'message';
        
    $login = $this->session->userdata('login');
    $password = $this->session->userdata('password');
    $role = $this->session->userdata('role');
    
    $this->load->view('../common/header');
    $this->load->view('admin/content',$data);
    $this->load->view('classe/layout',$data);
    $this->load->view('../common/footer');


  }
  
  function suppression($id = NULL)
  {
      $this->load->helper('form');
      
      if( $this->input->is_ajax_request()){
          $this->load->view('classe/delete_confirm');
        
      }else{
          if( $this->input->post('confirm') === NULL){
                $data['action'] = "confirm";
            
          }else{
            $this->delete();
            $data['action'] = "result";
          }
          $data['title'] = "Suppression Classe";

          $this->load->view('../common/header',$data);
          $this->load->view('classe/delete',$data);
          $this->load->view('../common/footer',$data);
      }
}

  function setValidation()
  {
      $this->form_validation->set_rules('idclasse','numero classe','required');   
    
  }



  
}
?>