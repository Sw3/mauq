<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Educacion extends CI_Controller {
	
	//Funcion que actualiza un registro de un recurso educativo
	public function EditarRecurso(){

	}
	//Función para cargar un archivo al directorio de recursos educativos e ingresarlo a la bd
	public function nuevoRecurso(){
		$this->load->database();
		 $target_path = 'Recs/';
	     $archivos = $_FILES['recurso']['name'];	     
	     //verifica que no exista un archivo con el mismo nombre
 		if($this->verificar(basename($_FILES['recurso']['name']), 'Recs'))
 		{
 			//si no existe, lo inserta
 		 	$target_path = $target_path .  $this->limpiar(basename( $_FILES['recurso']['name']));
 			if(move_uploaded_file($_FILES['recurso']['tmp_name'], $target_path)) 
 			{
 			//todo salio bien
 				$hoy = getdate();
 				//Inserta en la base de datos la información
				$arr = array(
					'NOMBRE' => $_POST['NomRec'],
					'DESCRIPCION' => $_POST['decrec'],
					'URL' =>  $target_path,
					'FECHA' => date("d") . "/" . date("m") . "/" . date("Y")
				);
				$this->db->insert('RECURSOS', $arr); 

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
 		echo 'El archivo ya existe: '.$_FILES['recurso']['name'];
 		}
 		$this->load->database();
		$this->load->helper('url');
		$this->load->view('educacion');
	}

	//Función que lista los recursos registrados hasta el momento
	public function ListarRecursos(){
		$this->load->database();
		$query = $this->db->get_where('RECURSOS');
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
