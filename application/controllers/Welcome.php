<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{	
		$this->load->database();
		$this->load->helper('url');
			$this->load->database();
		$this->load->view('inicio');
	}

	public function registro()
	{	
		$this->load->database();
		$this->load->helper('url');
			$this->load->database();
		$this->load->view('index');
	}
			public function busqueda()
	{	
 
		$this->load->database();
		$this->load->helper('url');
		$this->load->view('busqueda');
	}		
			public function educacion()
	{	
		$this->load->database();
		$this->load->helper('url');
		$this->load->view('educacion');
	}
			public function publico()
	{	
 
		$this->load->database();
		$this->load->helper('url');
		$this->load->view('publico');
	}
			public function reportes()
	{	
 
		$this->load->database();
		$this->load->helper('url');
		$this->load->view('reportes');
	}
			public function inicio()
	{	
 
		$this->load->database();
		$this->load->helper('url');
		$this->load->view('inicio');
	}
			public function museo()
	{	
 
		$this->load->database();
		$this->load->helper('url');
		$this->load->view('museo');
	}
			public function explora()
	{	
 
		$this->load->database();
		$this->load->helper('url');
		$this->load->view('explora');
	}
			public function donaciones()
	{	
 
		$this->load->database();
		$this->load->helper('url');
		$this->load->view('donaciones');
	}
			public function visitas()
	{	
 
		$this->load->database();
		$this->load->helper('url');
		$this->load->view('visitas');
	}
}