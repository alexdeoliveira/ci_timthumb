<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Images extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		log_message('debug', 'Class '.__CLASS__.' initialized.');
		$this->load->library('ci_timthumb');
	}

	function _remap()
	{
		$params = $this->uri->segment(2); //Primeiro parâmetro
		$_SERVER['QUERY_STRING'] = $params; //Altera a imagem do cache quando trocar o parametro
		$params = explode('__', $params);
		$src = end($params); //Atribui o último índice do array para a variável src

		array_pop($params); //Remove o último índice do array

		if ($params) {
			$params = $params[0];
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