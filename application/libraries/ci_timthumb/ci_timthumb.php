<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('timthumb.php');
class Ci_timthumb {

	private $img_directory;

	public function __construct()
	{
		$this->img_directory = 'file/images/';
	}

	public function load($src, $params = FALSE)
	{
		$w 		= isset($params['w']) ? $params['w'] : FALSE ;
		$h 		= isset($params['h']) ? $params['h'] : FALSE ;
		$q 		= isset($params['q']) ? $params['q'] : 90 ;
		$a 		= isset($params['a']) ? $params['a'] : FALSE;
		$zc		= isset($params['zc']) ? $params['zc'] : FALSE;
		$f		= isset($params['f']) ? $params['f'] : FALSE;
		$s		= isset($params['s']) ? $params['s'] : FALSE;
		$cc		= isset($params['cc']) ? $params['cc'] : FALSE;
		$ct		= isset($params['ct']) ? $params['ct'] : FALSE;

		$timthumb = new Timthumb();
		$get = array(
			'src' 	=> 	base_url().$this->img_directory.$src,
			'w'		=>	$w,
			'h'		=>	$h,
			'q'		=>	$q,
			'a'		=>	$a,
			'zc'	=>	$zc,
			'f'		=>	$f,
			's'		=>	$s,
			'cc'	=>	$cc,
			'ct'	=>	$ct,
		);
		$_GET = $get;
		$timthumb->start();
	}

}

/* End of file ci_timthumb.php */
/* Location: ./application/libraries/ci_timthumb/ci_timthumb.php */