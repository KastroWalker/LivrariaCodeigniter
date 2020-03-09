<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Livros extends CI_Controller {
		
		public function __construct(){
			parent::__construct();
			
			# Carregando funcoes_helper
			$this->load->helper('funcoes_helper');
			# Verificando se o Usuário está logado
			verificaLogin($this->session->userdata('logado'));
			
			# Carregado model de livros
			$this->load->model('LivrosModel', 'livros');
			# Carregando Helper Form
			$this->load->helper('form');
			# Carregando Library Form_Validation
			$this->load->library('form_validation');
		}

		public function index() {
			$this->list();
		}

		public function list(){
			$data['titulo'] = 'Livros';
			$data['livros'] = $this->livros->listarLivros();
			
			$this->load->view('header', $data);
			$this->load->view('livros/home');
			$this->load->view('footer');
		}

		public function add(){
			$this->form_validation->set_rules('titulo', 'Titulo', 'trim|required|min_length[3]|max_length[200]');
			$this->form_validation->set_rules('resumo', 'Resumo', 'trim');
			$this->form_validation->set_rules('autor', 'Autor', 'trim|required|min_length[3]|max_length[150]');
			$this->form_validation->set_rules('preco', 'Titulo', 'required');

			if ($this->form_validation->run() == TRUE) {
				# Salvando Imagem
				$config['upload_path'] = './upload/';
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size'] = 2048;
				$config['encrypt_name'] = TRUE;

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload('foto_livro')){
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro ao cadastrar livro, não foi possivel enviar o arquivo.</div>');
					redirect('livros');
				} else {
					$inputAdicionar['titulo'] = $this->input->post('titulo');
					$inputAdicionar['autor'] = $this->input->post('autor');
					$inputAdicionar['preco'] = $this->input->post('preco');
					$inputAdicionar['resumo'] = $this->input->post('resumo');
					$inputAdicionar['ativo'] = $this->input->post('ativo');
					$inputAdicionar['img'] = $this->upload->data('file_name');
				
					$this->livros->cadastrarLivro($inputAdicionar);
					$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Livro Cadastrado com sucesso.</div>');
				}

				
				redirect('livros');
			} else {
				$data['titulo'] = 'Cadastrar Livro';

				$this->load->view('header', $data);
				$this->load->view('livros/cadastro');
				$this->load->view('footer');
			}
		}

		public function edit($id=NULL){
			if(!$id){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, você deve passar um id de livro.</div>');
				redirect('livros');
			}

			$query = $this->livros->pegaLivroID($id);

			if(!$query){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro livro não encontrado.</div>');
				redirect('livros');
			}

			$this->form_validation->set_rules('titulo', 'Titulo', 'trim|required|min_length[3]|max_length[200]');
			$this->form_validation->set_rules('resumo', 'Resumo', 'trim');
			$this->form_validation->set_rules('autor', 'Autor', 'trim|required|min_length[3]|max_length[150]');
			$this->form_validation->set_rules('preco', 'Titulo', 'required');

			if ($this->form_validation->run() == TRUE) {
				$nome_imagem = NULL;

				# Salvando Imagem
				$config['upload_path'] = './upload/';
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size'] = 2048;
				$config['encrypt_name'] = TRUE;

				$this->load->library('upload', $config);

				if($this->upload->do_upload('foto_livro')){
					$nome_imagem = $this->upload->data('file_name');
				}

				$inputAdicionar['titulo'] = $this->input->post('titulo');
				$inputAdicionar['autor'] = $this->input->post('autor');
				$inputAdicionar['preco'] = $this->input->post('preco');
				$inputAdicionar['resumo'] = $this->input->post('resumo');
				$inputAdicionar['ativo'] = $this->input->post('ativo');

				if($nome_imagem){
					$inputAdicionar['img'] = $nome_imagem;
				}

				$this->livros->atualizaLivro($inputAdicionar, ['id' => $this->input->post('id_livro')]);
				$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Livro Editado com sucesso.</div>');
				
				redirect('livros');
			} else {
				$data['titulo'] = 'Editar Livro';
				$data['query'] = $query;

				$this->load->view('header', $data);
				$this->load->view('livros/edit');
				$this->load->view('footer');
			}
		}
		
		public function del($id=NULL){
			if(!$id){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, você deve passar um id de livro.</div>');
				redirect('livros');
			}

			$query = $this->livros->pegaLivroID($id);

			if(!$query){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro livro não encontrado.</div>');
				redirect('livros');
			}

			$this->livros->apagarLivro($query->id);
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Livro Editado com sucesso.</div>');

			redirect('livros');
		}

		public function info($id=NULL){
			if(!$id){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, você deve passar um id de livro.</div>');
				redirect('livros');
			}

			$query = $this->livros->pegaLivroID($id);

			if(!$query){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro livro não encontrado.</div>');
				redirect('livros');
			}
		}

		public function ativar($id=NULL){
			if(!$id){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, você deve passar um id de livro.</div>');
				redirect('livros');
			}

			$query = $this->livros->pegaLivroID($id);

			if(!$query){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro livro não encontrado.</div>');
				redirect('livros');
			}

			$this->livros->atualizaLivro(['ativo' => 1], ['id' => $query->id]);
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Livro Editado com sucesso.</div>');

			redirect('livros');
		}

		public function inativar($id=NULL){
			if(!$id){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, você deve passar um id de livro.</div>');
				redirect('livros');
			}

			$query = $this->livros->pegaLivroID($id);

			if(!$query){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro livro não encontrado.</div>');
				redirect('livros');
			}

			$this->livros->atualizaLivro(['ativo' => 0], ['id' => $query->id]);
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Livro Editado com sucesso.</div>');

			redirect('livros');
		}
	}

	/* End of file Livro.php */
	/* Location: ./application/controllers/Livro.php */