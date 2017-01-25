<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class reportes extends CI_Controller {

	public function cargarFechas(){
		$this->load->database();
		$this->db->where('COMENTARIOSIDENT !=', 'SD');
		//$this->db->limit(15);
		$query = $this->db->get('ESPECIMEN', 15, $_POST[0]);

		echo '<div class="close">X</div></div>
<h3>Se cargarán grupos de 15 fechas en cada página</h3>
<h3>El formato aceptado es DD/MM/AAAA</h3>
<center>
<form method="post" id="formulario" enctype="multypart/form-data">
<table>
	<tr>
		<th>Fecha errónea</th>
		<th>Corrección</th>
	
	';
		foreach ($query->result() as $key) {
			echo '<tr><td> '.$key->COMENTARIOSIDENT.'</td>
					<td><input type="text" class="fechas" name="'.$key->ESPECIME_ID.'"></td></tr>';
		}
		echo'</tr>
		</table>
		</form>
		<div class="edit_btn" id="save">Guardar cambios</div>
		<div class="edit_btn" id="sig">Siguiente página > </div>
		</center>';
	}

public function actualizafecha(){
	$this->load->database();
	foreach ($_POST as $key => $value) {
		if($value !=""){
		$data = array(
               'COMENTARIOSIDENT' => "SD",
               'FECHAEVENTO' => $value,
            );

			$this->db->where('ESPECIME_ID', $key);
			$this->db->update('ESPECIMEN', $data); 
		}

		
	}
	echo "Los cambios se han guardado";
}
public function cantidadFechas(){
	$this->load->database();
$this->db->where('COMENTARIOSIDENT !=', 'SD');
	$this->db->from('ESPECIMEN');
	echo $this->db->count_all_results();
}

public function cantidadEspecimenes(){
	$this->load->database();
	$this->db->select_sum('NUMINDS');
	$query = $this->db->get('ESPECIMEN');
	echo ($query->result()[0]->NUMINDS);
}
}
