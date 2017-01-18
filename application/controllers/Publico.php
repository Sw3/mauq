<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publico extends CI_Controller {

	/*
	subseccion explora
	*/
	//Función para mostrar las gavetas en la parte de administración
	public function getGavetas(){
		$this->load->database();
		$this->db->order_by('ORD', 'asc');
		$query = $this->db->get('GAVETAS');
		echo '<div class="Btns" id="nvgvt">Crear una nueva gaveta</div>  <br /> <br />';
		$gavetaActual = 1;
		echo '<table cellspacing="0" cellpadding="0" bordercolor="#D3D3D3" border="1" class="gvt">
							<tr>
								<th colspan="4"> Gaveta: '.$gavetaActual.'</th>
								<td><div class="Btns" fn="nvcajon" gv="'.$gavetaActual.'">Agregar cajon</div></td>
							</tr>
							<tr><th>#</th>
								<th> Nombre</th>
								<th> Descripcion</th>
								<th> Foto</th>
								<th> Cajón</th>
							</tr>';
		foreach ($query->result() as $key) {
			if((int)(($key->ORD)/100)>$gavetaActual){
				
				echo '<tr ><td colspan="5" >
							<div class="Btns" fn="dlt" gv="'.$gavetaActual.'">Eliminar esta gaveta</div></td>
							</tr></table>'; //la gaveta ha finalizado
							$gavetaActual = (int)(($key->ORD)/100); //inicia nueva gaveta
				echo '<table cellspacing="0" cellpadding="0" bordercolor="#D3D3D3" border="1" class="gvt">
							<tr>
								<th colspan="4"> Gaveta: '.$gavetaActual.'</th>
								<td><div class="Btns" fn="nvcajon" gv="'.$gavetaActual.'">Agregar cajon</div></td>
							</tr>
							<tr><th>#</th>
								<th> Nombre</th>
								<th> Descripcion</th>
								<th> Foto</th>
								<th> Cajón</th>
							</tr>';
							echo '<tr><td>'.$key->NUM_CAJON.'</td>
								<td> '.$key->NOM.'</td>
								<td> '.$key->DESCRIPCION.'</td>
								<td><div class="Btns">Ver</div></td>
								<td><div class="Btns" fn="edt" cj="'.$key->ID.'">Editar</div>
								<div class="Btns" fn="elcaj" cj="'.$key->ID.'" >Eliminar</div></td>
							</tr>';

					
			}else{
				echo '<tr><td>'.$key->NUM_CAJON.'</td>
								<td> '.$key->NOM.'</td>
								<td> '.$key->DESCRIPCION.'</td>
								<td><div class="Btns">Ver</div></td>
								<td><div class="Btns" fn="edt" cj="'.$key->ID.'">Editar</div>
								<div class="Btns" fn="elcaj" cj="'.$key->ID.'" >Eliminar</div></td>
							</tr>';
			}
		}
		echo '<tr ><td colspan="5" >
							<div class="Btns" fn="dlt" gv="'.$gavetaActual.'">Eliminar esta gaveta</div></td>
							</tr></table>';
	}
	//Función para obtener la información de un cajon para cambios
	public function infoCajon(){
		$this->load->database();
		$query = $this->db->get_where('GAVETAS', array('ID' => $_POST[1]));
		
	}

	//Función para agregar un cajón
	public function agregarCajon(){
		$this->load->database();
		$this->db->order_by('NUM_CAJON', 'desc');
		$query = $this->db->get_where('GAVETAS', array('GAVETA' => $_POST[1]));

		$cajon = $query->result()[0]->NUM_CAJON;
		$cajon += 1;
		$arr = array('GAVETA' => $_POST[1],
			'NUM_CAJON' => $cajon
			);
		$this->db->insert('CAJON', $arr); 
	}
	//Función para eliminar un cajón
	public function eliminarCajon(){
		$this->load->database();
		$this->db->delete('CAJON', array('ID' => $_POST[1])); 
	}
	//funcion para eliminar una gaveta
	public function EliminarGaveta() {
		$this->load->database();
		$this->db->delete('CAJON', array('GAVETA' => $_POST[1])); 
	}

	//Función para crear una nueva gaveta
	public function crearGaveta(){
		$this->load->database();
		$this->db->order_by('GAVETA', 'desc');
		$query = $this->db->get('GAVETAS');

		$nuevaGaveta = $query->result()[0]->GAVETA;
		$nuevaGaveta += 100;
		$arr = array(
			'GAVETA' => $nuevaGaveta,
			'NUM_CAJON' => 1,
			);
		$this->db->insert('CAJON', $arr); 
	}
	public function cajon(){
		$this->load->database();
		 $target_path = 'Exp/';
	     $archivos = $_FILES['recurso']['name'];	     
	     //verifica que no exista un archivo con el mismo nombre
 		if($this->verificar(basename($_FILES['recurso']['name']), 'Exp'))
 		{
 			//si no existe, lo inserta
 		 	$target_path = $target_path .  $this->limpiar(basename( $_FILES['recurso']['name']));
 			if(move_uploaded_file($_FILES['recurso']['tmp_name'], $target_path)) 
 			{
 			//todo salio bien
 				//Inserta en la base de datos la información
				$arr = array(
					'NOM' => $_POST['nombre'],
					'DESCRIPCION' => $_POST['desc'],
					'FOTO' =>  $target_path
				);
				$this->db->where('ID', $_POST['ident']);
				$this->db->update('CAJON', $arr); 

				print "<script type=\"text/javascript\">alert('Se ha cargado exitosamente');</script>";
			} else
			{
				if($_FILES['recurso']['error']==1){
					print "<script type=\"text/javascript\">alert('El tamaño máximo de los archivos es de 20 MB');</script>";
				}else{
					print "<script type=\"text/javascript\">alert('Ha ocurrido un error durante la carga del arhivo, por favor consulte con el administrador del sistema. Código de error:".$_FILES['recurso']['error']."');</script>";
				}
	 			
			}
 		}
 		else
		{
 		echo '<script type=\"text/javascript\">El archivo ya existe: '.$_FILES['recurso']['name'].'</script>';
 		}
 		$this->load->helper('url');
 		redirect('/welcome/publico', 'location');
	}
	//funcion que verifica la existencia de un archivo en un paquete
	public function verificar($file, $path){
		$val = true;
		$incorrecto = array();
		$rev = scandir($path);
		foreach ($rev as $key)
		{ 
			if($key == $file){
				$val = false;
				break;
			}else{
				$val = true;
			}
		}
		return $val;
	}
		//funcion que limpia el nombre de una cadena
	function limpiar($string ){
		$string = htmlentities($string);
 		$string = preg_replace('/\&(.)[^;]*;/', '\\1', $string);
 		return str_replace (" " , "_", $string);
	}
}
