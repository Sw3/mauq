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
								<td><div class="Btns" fn="edt" nm="'.$key->NOM.'" ds="'.$key->DESCRIPCION.'" img="'.$key->FOTO.'" cj="'.$key->ID.'">Editar</div>
								<div class="Btns" fn="elcaj" cj="'.$key->ID.'" >Eliminar</div></td>
							</tr>';

					
			}else{
				echo '<tr><td>'.$key->NUM_CAJON.'</td>
								<td> '.$key->NOM.'</td>
								<td> '.$key->DESCRIPCION.'</td>
								<td><div class="Btns">Ver</div></td>
								<td><div class="Btns" fn="edt"nm="'.$key->NOM.'" ds="'.$key->DESCRIPCION.'" img="'.$key->FOTO.'" cj="'.$key->ID.'">Editar</div>
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
	//actualiza la informacion del cajon
	public function actualizaInfoCajon(){
		$this->load->database();
				$arr = array(
					'NOM' => $_POST[0],
					'DESCRIPCION' => $_POST[1]
				);
				$this->db->where('ID', $_POST[2]);
				$this->db->update('CAJON', $arr); 
	}
	//actualiza la foto del cajon
	public function actualizafotoCajon(){
		print_r($_POST);
		$this->load->database();
				$arr = array(
					'FOTO' => $_POST[0]
				);
				$this->db->where('ID', $_POST[1]);
				$this->db->update('CAJON', $arr); 
	}
}
