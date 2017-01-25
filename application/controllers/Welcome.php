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
		if($this->logeado()){
		$this->load->database();
		$this->load->helper('url');
		$this->load->database();
		$this->load->view('index');
		}
		
	}
			public function busqueda()
	{	
 		if($this->logeado()){
			$this->load->database();
		$this->load->helper('url');
		$this->load->view('busqueda');
		}
		
	}		
			public function educacion()
	{	
		if($this->logeado()){
		$this->load->database();
		$this->load->helper('url');
		$this->load->view('educacion');
		}
		
	}
			public function publico()
	{	
 		if($this->logeado()){
			$this->load->database();
		$this->load->helper('url');
		$this->load->view('publico');
		}
		
	}
			public function reportes()
	{	
 		if($this->logeado()){
			$this->load->database();
		$this->load->helper('url');
		$this->load->view('reportes');
		}
		
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
		$this->load->view('protocolos');
	}
			public function visitas()
	{	
 
		$this->load->database();
		$this->load->helper('url');
		$this->load->view('recursos');
	}
	//Carga el contenido de la zona pública
	public function cargarContenido(){
		$this->load->database();
		$query = $this->db->get_where('TEXTOPUBLICO', array('SECCION' => $_POST[0]));
		echo($query->result()[0]->CONTENIDO);
	}
	//actualiza el contenido de la zona publica
	public function actualizarContenido(){
		print (".");
		$this->load->database();
		$arr = array(
					'CONTENIDO' => $_POST[0]
				);
				$this->db->where('SECCION', $_POST[1]);
				$this->db->update('TEXTOPUBLICO', $arr); 
				echo "Se ha actualizado la seeción.";
	}
	public function login(){
		$this->load->database();
		$query = $this->db->get_where('USUARIOS', array('USR' => $_POST[0], 'PASSWORD' => $_POST[1]));
		if(isset($query->result()[0])){
			//creacion de la sesion
			session_start();
			$_SESSION["usr"]=$query->result()[0]->ID;
			echo "ok";
		}else{
			echo "existe un error en la combinacion usuario/contraseña";
		}

	}
	public function logeado(){
		$this->load->helper('url');
		session_start();
		if(isset($_SESSION["usr"])){
			return true;
		}else{
			echo('<script type="text/javascript">
 			 window.location.href = "'.base_url().'index.php/Welcome/index";
			</script>');
			return false;
		}
	}
	public function logOut(){
		session_start();
		session_destroy();
	}

	//Función que lista los recursos en tabla para la zona publica
	public function TablaProtocolos(){
		$this->load->database();
		$this->load->helper('url');
		$query = $this->db->get_where('RECURSOS', array('ACTIVO' => $_POST[0]));
		$this->db->order_by('FECHA', "desc");

		echo "<center><table id='prototabla' width='100%' >
			    <tr>
			      <th>Nombre</th>
			      <th>Descripción</th>	      
			      <th>Fecha</th>
			      <th>Descarga</th>
			      <td></td>
			      <td></td>
			    </tr>";
		foreach ($query->result() as $row)
		{
			echo '<tr style="text-align:center;">
			      <td style="text-align:left;">'.$row->NOMBRE.'</td>
			      <td>'.$row->DESCRIPCION.'</td>
			      <td>'.$row->FECHA.'</td>
			      <td><a href="'.base_url().$row->URL.'" target="_blank" ><img src="'.base_url().'sources/images/dl.png" width="20px"> </a></td>
			    </tr>';
		}
		echo '</table></center>';
	}
}
