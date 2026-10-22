<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilisateur extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Utilisateur_model');
        $this->load->library(['form_validation','pagination','session']);
        $this->lang->load('fr_admin_lang','french');

        // Vérifier si l'utilisateur est connecté
       
    }

    public function index(){
        $page = $this->uri->segment(4,0);

        $config['base_url']    = site_url().'/utilisateur/index/page';
        $config['per_page']    = 10;
        $config['uri_segment'] = 4;

        $users = $this->Utilisateur_model->findAll($config['per_page'],$page);

        $config['first_link'] = 'Début';
        $config['next_link']  = 'Suivant';
        $config['last_link']  = 'Fin';
        $config['prev_link']  = 'Précédent';
        $config['total_rows'] = $this->Utilisateur_model->getCountTable();  

        $data['login']       = $this->session->userdata('username');
        $data['role']        = $this->session->userdata('role');
        $data['titre']       = 'Liste des utilisateurs';
        $data['liste_users'] = $users;   
        $data['context']     = 'list';

        $this->pagination->initialize($config);

        $this->load->view('../common/header');
        $this->load->view('admin/content',$data);
        $this->load->view('utilisateurVue/layout',$data);
        $this->load->view('../common/footer');
    }

    function show_add(){
        $data['context']     = 'edit';
        $data['mode']        = 'add';
        $data['mode_titre']  = 'Ajouter';
        $data['titre']       = 'Liste des utilisateurs';
        $data['user']        = [];
        $data['titre_edit']  = 'Ajouter un utilisateur';

        $this->load->view('../common/header');
        $this->load->view('admin/content',$data);
        $this->load->view('utilisateurVue/layout',$data);
        $this->load->view('../common/footer');
    }   

    function add(){
        $this->setValidation();
        if($this->form_validation->run() == FALSE){
            $this->show_add();
        } else {
            $data['login']    = $this->input->post('Login', TRUE);
            $password         = $this->input->post('Password', TRUE);
            $data['password'] = md5($password); // cohérent avec ton insert SQL
            $data['role']     = $this->input->post('Role', TRUE);
            $data['nbrtentative'] = 0;
            $data['bloque']       = 0;

            $this->Utilisateur_model->add($data);

            $data['context'] = 'message';
            $data['titre']   = 'Saisie validée';

            redirect('utilisateur/index');
        }
    }  

    function show_update($login){
        $data['majuser']    = $this->Utilisateur_model->find($login);
        $data['context']    = 'edit';
        $data['mode']       = 'update';
        $data['mode_titre'] = 'Modifier';
        $data['titre']      = 'Liste des utilisateurs';
        $data['titre_edit'] = 'Modifier un utilisateur';

        $this->load->view('../common/header');
        $this->load->view('admin/content',$data);
        $this->load->view('utilisateurVue/layout',$data);
        $this->load->view('../common/footer');
    }

    function update(){
        $this->setValidation();
        $login              = $this->input->post('Login', TRUE);
        $password           = $this->input->post('Password', TRUE);
        $data['password']   = md5($password);
        $data['role']       = $this->input->post('Role', TRUE);

        if ($this->form_validation->run() == FALSE){
            $this->show_update($login);
        } else {
            $this->Utilisateur_model->update($login, $data);
            redirect('utilisateur/index');
        }
    }

    function delete($login){
        $this->Utilisateur_model->delete($login);
        redirect('utilisateur/index');
    }

    function setValidation() {
        $this->form_validation->set_rules('Login', 'Login', 'required');
        $this->form_validation->set_rules('Password', 'Mot de passe', 'required'); 
        $this->form_validation->set_rules('Role', 'Profil', 'required');
    }
}
