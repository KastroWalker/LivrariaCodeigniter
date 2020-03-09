<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Livraria extends CI_Controller {
		
		public function __construct() {
			parent::__construct();

			# Carregando Model Livros
			$this->load->model('LivrosModel', 'livros');
			# Carregando Model Usuários
			$this->load->model('UsuariosModel', 'usuario');
			# Carregando funcoes_helper
			$this->load->helper('funcoes_helper');
			# Carregando Helper Form
			$this->load->helper('form');
			# Carregando Library Form_Validation
			$this->load->library('form_validation');
			# Carregando o Helper Secutity
			$this->load->helper('security');
		}

		public function index() {
			$this->load->view('index');
		}

		public function login() {
			if($this->input->post()){
				# Validando os campos
				$this->form_validation->set_rules('user', 'Usuário', 'trim|required');
				$this->form_validation->set_rules('senha', 'Senha', 'trim|required');
				
				if($this->form_validation->run() == TRUE){
					$login = $this->input->post('user');
					$senha = do_hash($this->input->post('senha'));

					$login = $this->usuario->login($login, $senha);

					if($login->ativo == 0){
						$this->session->set_flashdata('erro_login', '<div class="alert alert-danger" role="alert">Este usuário está inativo.</div>');
						redirect('livraria/index');
					}

					if($login){
						$dadosAcesso = [
							'logado' => TRUE,
							'nome'   => $login->nome,
							'login'  => $login->email
						];
					
						$this->session->set_userdata($dadosAcesso);

						if($this->session->userdata('logado')){
							redirect('livraria/home');
						} else {
							redirect('livraria/index');
						}
					} 
					redirect('livraria/index');
				} else {
					$this->load->view('livraria/index');
				}
			}
		}

		public function home() {
			# Verificando se o Usuário está logado
			verificaLogin($this->session->userdata('logado'));	
			
			# Criando Dados
			$data['titulo'] = "Home - Livraria";

			# Carregando a página principal
			$this->load->view('header', $data);
			$this->load->view('conteudo/index');
			$this->load->view('footer');	
		}

		public function info($id=NULL) {
			# Verificando se o Usuário está logado
			verificaLogin($this->session->userdata('logado'));

			$this->load->view('header');

			if ($id == NULL) {
				$data['titulo'] = "Livro Não Encontrado";
				$this->load->view('conteudo/invalido', $data);
			} else {
				# Carregando dados do livro
				$query = $this->livros->getById($id);

				if ($query) {
					# Guardando dados do livo
					$data['titulo'] = $query->nome_livro;
					$data['livro'] = $query;

					# Carregando a página de info do livro
					$this->load->view('conteudo/info', $data);	
				} else {
					$data['titulo'] = "Livro Não Encontrado";
					$this->load->view('conteudo/invalido', $data);
				}
			}

			$this->load->view('footer');
		}

		public function logout() {
			$this->session->sess_destroy();

			redirect('livraria/index');
		}
	}

	/* End of file Livraria.php */
	/* Location: ./application/controllers/Livraria.php */