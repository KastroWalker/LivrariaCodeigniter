<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class UsuariosModel extends CI_Model {
		public function listarUsuarios() {
			$query = $this->db->get('usuarios');
			return $query->result();
		}

		public function doInsert($data=NULL) {
			if (is_array($data)) {
				$this->db->insert('usuarios', $data);
			}
		}

		public function getUsuarioId($id=NULL){
			if ($id) {
				$this->db->where('id', $id);
				$this->db->limit(1);
				return $this->db->get('usuarios')->row();
			}
		}

		public function doUpdate($dados=NULL, $condicao=NULL){
			if (is_array($dados) && $condicao){
				$this->db->update('usuarios', $dados, $condicao);
			}
		}

		public function login($login=NULL, $senha=NULL){
			if($login && $senha){
				$this->db->where(['email' => $login, 'senha' => $senha]);
				$this->db->limit(1);
				$query = $this->db->get('usuarios');

				if($query->num_rows = 1) {
					return $query->row();
				} else {
					$this->session->set_flashdata('erro_login', '<div class="alert alert-danger" role="alert">Usuário ou senha incorreta.</div>');
					return false;
				}
			} else {
				$this->session->set_flashdata('erro_login', '<div class="alert alert-danger" role="alert">Erro ao tentar logar no sistema.</div>');
				return false;
			}
		}

		public function doDelete($id=NULL){
			if($id){
				$this->db->delete('usuarios', $id);
				return true;
			} else {
				return false;
			}
		}
	}

	/* End of file UsuariosModel.php */
	/* Location: ./application/models/UsuariosModel.php */