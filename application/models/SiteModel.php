<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class SiteModel extends CI_Model {

		public function listaLivros(){
			$this->db->where('ativo', 1);
			return $this->db->get('livros')->result();
		}

	}

	/* End of file SiteModel.php */
	/* Location: ./application/models/SiteModel.php */ ?>