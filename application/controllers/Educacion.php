<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Educacion extends CI_Controller {
	
	//Funcion que actualiza un registro de un recurso educativo
	public function EditarRecurso(){

	}
	//Función para cargar un archivo al directorio de recursos educativos e ingresarlo a la bd
	public function nuevoRecurso(){
		print_r($_POST);
		$this->load->database();
 				$hoy = getdate();
 				//Inserta en la base de datos la información
				$arr = array(
					'NOMBRE' => $_POST[0],
					'DESCRIPCION' => $_POST[1],
					'URL' =>  $_POST[2],
					'ACTIVO' => $_POST[3],
					'FECHA' => date("d") . "/" . date("m") . "/" . date("Y")
				);
				$this->db->insert('RECURSOS', $arr); 
	}

	//Función que lista los recursos registrados hasta el momento
	public function ListarRecursos(){
		$this->load->database();
		$query = $this->db->get_where('RECURSOS', array('ACTIVO' => $_POST[0]));
		$this->db->order_by('FECHA', "desc");

		echo "<table >
			    <tr>
			      <td>Nombre</td>
			      <td>Descripción</td>
			      <td>Ubicación</td>
			      <td>Visible</td>
			      <td>fecha</td>
			      <td></td>
			      <td></td>
			    </tr>";
		foreach ($query->result() as $row)
		{
			echo '<tr>
			      <td>'.$row->NOMBRE.'</td>
			      <td>'.$row->DESCRIPCION.'</td>
			      <td>'.$row->URL.'</td>';
			      if($row->ACTIVO=='1'){
			      	ECHO '<td><input type="checkbox" name="act" id="act" checked />';	
			      }else{
			      	ECHO '<td><input type="checkbox" name="act" id="act"  />';
			      }
			      echo '<td>'.$row->FECHA.'</td>
			      <td><a class="myButton" id="'.$row->ID.'">Eliminar</a></td>
			      <td><a class="edit_btn" id="eBtn">Editar</a></td>
			    </tr>';
		}
		echo '</table>';
	}	
	//Funcion para eliminar un recurso educativo
	public function eliminaRecurso(){
	//carga la base de datos
	$this->load->database();
	//ejecuta la elminación
	$this->db->delete('RECURSOS', array('ID' => $_POST[1])); 
	}
	/*FIN DE FUNCIONES PARA EL MOLO DE RECUSOS EDUCATIVOS*/
}
