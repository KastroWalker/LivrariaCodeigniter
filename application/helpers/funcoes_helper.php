<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	function formataDataBr($data=NULL) {
		/*
		 * Formato Padrão YYYY-MM-DD
		 * Formato Retornado DD/MM/YYYY 
		 */

		if ($data) {
			$data = explode("-", $data);
			return $data[2].'/'.$data[1].'/'.$data[0];
		}
	}

	function formataMoedaBr($valor=NULL) {	
		/*
		 * Formato Padrão 00.00
		 * Formato Retornado 00,00 
		 */

		if ($valor) {
			return 'R$ '.number_format($valor, 2, ',', '.');
		}
	}

	function verificaLogin($var){
		if(!$var){
			redirect('livraria/index');
		}
	}