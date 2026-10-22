<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard extends CI_Controller {

		
		function __construct ()
		{
			
			parent::__construct();
			
			$this->load->model('Dashboard_model');
			$this->load->model('User_model');  
			$this->load->library('form_validation');
			//$this->load->library('session');
			$this->load->library('pagination');
			//$this->output->enable_profiler(TRUE);
			$this->lang->load('en_admin_lang','english');

			// Vérifier si l'utilisateur est connecté
        	if (!$this->session->userdata('logged_in')) {
            		redirect('User/index'); // redirige vers login
        	}
		}

		public function index() {

			$page = $this->uri->segment(4,0);
				
			$config['base_url'] = site_url().'Admin/index';

			$config['prev_tag_open'] = '<div class="btn btn-default">';
			$config['prev_tag_close'] = '</div>';
			$config['next_tag_open'] = '<div class="btn btn-default">';
			$config['next_tag_close'] = '</div>';
			$config['cur_tag_open'] = '<div class="btn btn-default">';
			$config['cur_tag_close'] = '</div>';
			$config['num_tag_open'] = '<div class="btn btn-default">'; 
			$config['num_tag_close'] = '</div>';


			$loginUser = $this->session->userdata('username');
			$roleUser = $this->session->userdata('role');
			//var_dump($this->session->all_userdata());die();

			$data['login'] = $loginUser;
			$data['role'] = $roleUser;
			//var_dump($data['login']);die();

			$data['context'] = 'list';

			$data['Nbre_voiture'] = $this->Dashboard_model->countCarNumber();
				
			$rotations = $this->Dashboard_model->getRotationsBySite(); 

			// Initialisation
			$labels = [];
			$values = [];

			// Sécuriser les valeurs manquantes
			$sites = ['CONCENTRIX', 'LFT', 'FUTURMAP', 'MISTERCALL'];
			$map = array_fill_keys($sites, 0);
			


			foreach ($rotations as $row) {
				$map[$row['NomSite']] = (int)$row['total'];
			}

			
			$data['chart_labels'] = array_keys($map);
			$data['chart_values'] = array_values($map);
			$data['rotation_map'] = $map; 

			//var_dump( $data['nbreVoiture']);die();
				
			$this->pagination->initialize($config); 

			$this->load->view('common/header.php');

			if($roleUser == 'superAdmin'){

				$this->load->view('/nav/top_nav', $data);

			} elseif($roleUser == 'admin'){

				$this->load->view('/nav/top_navAdmin', $data);

			}else{

				$this->load->view('/nav/top_navPrest', $data);
			}

			$this->load->view('dashboard/layout',$data); 
			$this->load->view('common/footer.php');
		}

	}