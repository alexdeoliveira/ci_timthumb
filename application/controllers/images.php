<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Images extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		log_message('debug', 'Class '.__CLASS__.' initialized.');
		
		// Carrega a biblioteca ci_timthumb
		$this->load->library('ci_timthumb');

		
	}

	function _remap()
	{
		$params = $this->uri->segment(2); //Primeiro parâmetro
		$src 	= $this->uri->segment(3); //Segundo parâmetro

		//Verifica se o segundo parâmetro está vazio e se os últimos 3 caracteres do segundo contém os caracteres do array
		if (!$src AND in_array(substr($params, -3), array('jpg', 'gif', 'png', 'peg'))) {
			$src = $params;
			$params = FALSE;
		}

		if ($params) {
			$params = $this->_organize_parameters($params);	
		}

		// retorna a imagem ajustada
		return $this->ci_timthumb->load($src, $params);

	}

	/**
	 * Organiza os parâmetros para serem enviados como array para a biblioteca timthumb
	 * @param array
	 * @return array
	 */
	private function _organize_parameters($params)
	{
		$params = explode('_', $params);
		foreach ($params as $param) {
			$key = substr($param, 0, 1);
			$value = substr($param, 1);
			if ($key == 'z' OR $key == 'c') 
			{
				$key = substr($param, 0, 2);
				$value = ($key == 'cc' ? '#' : '').substr($param, 2);
			}
			$params_array[$key] = $value;
		}

		return $params_array;
	}

}

/* End of file images.php */
/* Location: ./application/controllers/images.php */