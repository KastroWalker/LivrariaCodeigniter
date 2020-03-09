<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Site extends CI_Controller {

		public function __construct(){
			parent::__construct();
			
			$this->load->model('SiteModel', 'site');
		}

		public function index(){
			$data['livros'] = $this->site->listaLivros();
			$this->load->view('web/site', $data);
		}

	}

	/* End of file Site.php */
	/* Location: ./application/controllers/Site.php */ ?>