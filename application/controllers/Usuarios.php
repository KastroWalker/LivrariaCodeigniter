<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Usuarios extends CI_Controller {

		public function __construct(){
			parent::__construct();
			
			# Carregando funcoes_helper
			$this->load->helper('funcoes_helper');
			# Verificando se o Usuário está logado
			verificaLogin($this->session->userdata('logado'));
			
			# Carregando Model de Usuários
			$this->load->model('UsuariosModel', 'usuarios');
			# Carregando Helper Security
			$this->load->helper('security');
			# Carregando Helper Form
			$this->load->helper('form');
			# Carregando Library Form_Validation
			$this->load->library('form_validation');
		}

		public function index(){
			# Criando Dados
			$data['titulo'] = "Usuários";

			# Carregando livros
			$data['usuarios'] = $this->usuarios->listarUsuarios();

			# Carregando a página de livros
			$this->load->view('header', $data);
			$this->load->view('usuarios/home');
			$this->load->view('footer');
		}

		public function add(){
			# Criando Dados
			$data['titulo'] = "Cadastro Usuário";

			# Validando nome
			$this->form_validation->set_rules('nome', 'NOME', 'required');

			# Validando Senha
			$this->form_validation->set_rules('senha', 'SENHA', 'required');

			# Validando Senha
			$this->form_validation->set_rules('confsenha', 'Senha 2', 'required|matches[senha]', 
				array(
					'required' => 'O campo "Confirmar Senha" deve ser preenchido.',
					'matches'  => 'As Senhas não são iguais'
			));

			# Validando E-mail
			$this->form_validation->set_rules('email', 'E-Mail', 'required|valid_email');

			if($this->form_validation->run()){
				# Salvar no banco
				$dados['nome'] = $this->input->post('nome');
				$dados['email'] = $this->input->post('email');
				$dados['senha'] = hash('md5', $this->input->post('senha'));
				$dados['ativo'] = 1;

				$this->usuarios->doInsert($dados);

				$this->session->set_flashdata('user', '<p class="alert alert-success">Usuário criado com sucesso!</p>');

				redirect('usuarios','refresh');

			} else {
				$this->session->set_flashdata('user', '<p class="alert alert-danger">Erro ao criar o Usuário!</p>');

				$this->load->view('header', $data);
				$this->load->view('usuarios/cadastro');
				$this->load->view('footer');
			}

		}

		public function edit($id=NULL){
			if(!$id){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, você deve passar um id de usuário.</div>');
				redirect('usuarios');
			}

			# Validando nome
			$this->form_validation->set_rules('nome', 'NOME', 'required');

			# Validando E-mail
			$this->form_validation->set_rules('email', 'E-Mail', 'required|valid_email');


			$query = $this->usuarios->getUsuarioId($id);

			if (!$query) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, usuário não encontrado.</div>');
				redirect('usuarios');	
			}

			if($this->form_validation->run()){
				# Salvar no banco
				$dados['nome'] = $this->input->post('nome');
				$dados['email'] = $this->input->post('email');

				$this->usuarios->doUpdate($dados, ['id' => $this->input->post('id')]);

				$this->session->set_flashdata('user', '<p class="alert alert-success">Usuário editado com sucesso!</p>');

				redirect('usuarios','refresh');
			} else {
				$data['titulo'] = 'Editar Usuário';
				$data['query'] = $query;

				$this->load->view('header', $data);
				$this->load->view('usuarios/edit');
				$this->load->view('footer');
			}
		}

		public function del($id){
			if(!$id){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, você deve passar um id de usuário.</div>');
				redirect('usuarios');
			}

			$query = $this->usuarios->getUsuarioId($id);

			if (!$query) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, usuário não encontrado.</div>');
				redirect('usuarios');	
			}

			if($query->email == $this->session->userdata('login')){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, Você não pode apagar você mesmo.</div>');
				redirect('usuarios');	
			}

			if($this->usuarios->doDelete(['id' => $query->id])){
				$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Usuário apagado com sucesso.</div>');
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, Não foi possível apagar o usuário!</div>');
			}
			redirect('usuarios');
		}

		public function ativar($id=NULL){
			if(!$id){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, você deve passar um id de usuário.</div>');
				redirect('usuarios');
			}

			$query = $this->usuarios->getUsuarioId($id);

			if (!$query) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, usuário não encontrado.</div>');
				redirect('usuarios');	
			}

			if($query->email == $this->session->userdata('login')){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, Você não pode mudar o status de você mesmo.</div>');
				redirect('usuarios');	
			}

			$dados['ativo'] = 1;
			$this->usuarios->doUpdate($dados, ['id' => $query->id]);
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Usuário ativado com sucesso.</div>');
			redirect('usuarios');
		}

		public function inativar($id=NULL){
			if(!$id){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, você deve passar um id de usuário.</div>');
				redirect('usuarios');
			}

			$query = $this->usuarios->getUsuarioId($id);

			if (!$query) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, usuário não encontrado.</div>');
				redirect('usuarios');	
			}

			if($query->email == $this->session->userdata('login')){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, Você não pode mudar o status de você mesmo.</div>');
				redirect('usuarios');	
			}

			$dados['ativo'] = 0;
			$this->usuarios->doUpdate($dados, ['id' => $query->id]);
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Usuário inativado com sucesso.</div>');
			redirect('usuarios');
		}
	}

	/* End of file Usuarios.php */
	/* Location: ./application/controllers/Usuarios.php */
