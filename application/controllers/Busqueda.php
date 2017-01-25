<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Busqueda extends CI_Controller {
	
	//Función que regorna los elementos para construir un combobox
	 //$_POST[1] tiene el nombre de la tabla a consultar
	 //$_POST[2] tiene el id del elemento
	 //$_POST[3] tiene el id de la tabla de la bd
	 //$_POST[4] tiene el el valor para el elemento en la lista
	public function comboBox(){
	$this->load->database();
	$this->db->order_by($_POST[4], "asc");
	$query = $this->db->get($_POST[1]);

	echo '<select id="'.$_POST[2].'" width="140" style="width: 140px">';
	foreach ($query->result() as $row) {
		echo '<option value="'.$row->$_POST[4].'">'.$row->$_POST[4].'</option>';
	}
	echo "</select>";
	}	

	//Función que realiza la consulta de búsqueda en la base de datos
	public function buscar()
	{	//Verifica que reciba al menos un fitro de búsqueda
		if(!isset($_POST[1])){
			print "<script type=\"text/javascript\">alert('Debe añadir al menos un filtro para realizar la búsqueda');</script>";
		}
		else{
			//Contiene los filtros enviados por el usuario
		$arr = array();
		foreach ($_POST[1] as $key) {
			$dato = explode(": ", $key);
			$arr[ $dato[0] ] = $dato[1];
		}
		//carga la base de datos
		$this->load->database();
		$query = $this->db->get_where('REGISTRO', $arr, 8, $_POST[2]);
		//entrega los resultados
		foreach ($query->result() as $row)
		{
			//Contruye un div clase registro para mostrar los datos que coinciden con los criterios de búsqueda
			echo '<div class="registro" id="'.$row->ESPECIME_ID.'">
				<table width="465" border="0">
				  <tr>
				    <td width="118" class="title">Nombre cientifico</td>
				    <td width="138" class="title">Orden</td>
				    <td width="195" rowspan="6" bgcolor="#F9F7F7">&nbsp;</td>
				  </tr>
				  <tr>
				    <td class="info">'. $row->NOMBRECIENTIFICO.'</td>
				    <td class="info">'. $row->ORD.'</td>
				  </tr>
				  <tr>
				    <td class="title">Orden</td>
				    <td class="title">Familia</td>
				  </tr>
				  <tr>
				    <td class="info">'. $row->ORD.'</td>
				    <td class="info">'.$row->FAM.'</td>
				  </tr>
				  <tr>
				    <td class="title">Taxón</td>
				    <td class="title">Género</td>
				  </tr>
				  <tr>
				    <td class="info">'. $row->ORD.'</td>
				    <td class="info">'. $row->GEN.'</td>
				  </tr>
				  <tr>
				    <td class="title">Cant. Individuos</td>
				    <td class="title">Número de catálogo</td>
				    <td class="title">Fecha del evento</td>
				  </tr>
				  <tr>
				    <td class="info">'. $row->NUMINDS.'</a></td>
				    <td class="info">'. $row->NUMEROCATALOGO.'</a></td>
				    <td class="info">'.$row->FECHAEVENTO.'</a></td>
				  </tr>
				</table>
			</div>';
		}
		echo '	<br />
	<br />
	<br />
	<br />
	<br />
	
	';
		}
		
	}

	//Función para mostrar detalle de registro en módulo de búsqueda
	function detalle()
	{
		$this->load->helper('url');
		//carga el helper de base de datos
		$this->load->database();
		$arr  = array('ESPECIME_ID' => $_POST[1]);
		//ejecuta la consulta
		$query = $this->db->get_where('REGISTRO', $arr);

		$row = $query->result()[0];
		echo'<div class="close">X</div>

		<table cellspacing="0" cellpadding="0" class="tbl" border="1"  bordercolor="gray">
		  	<tr bgcolor="#F9F7F7" >
			    <td width="457" class="title">Acreditación    del origen del especímen</td>
			    <td width="145" class="title">Tipo del    registro</td>
			    <td width="148" class="title">Tipo de la    muestra</td>
			    <td width="190" class="title">ID del registro    biológico</td>
			    <td width="127" class="title">Número RNC</td>
			    <td width="160" class="title">Número de    catálogo</td>
			    <td width="137" class="title">Preparaciones</td>
			    <td width="395" class="title">Nombre del    colector</td>
		    </tr>
		    <tr  >
			    <td>'.$row->ACREDITACION.'</td>
			    <td>'.$row->TIPOREG.'</td>
			    <td>'.$row->TIPOMUES.'</td>
			    <td>'.$row->IDREGBIOLOG.'</td>
			    <td>'.$row->NUMERORNC.'</td>
			    <td>'.$row->NUMEROCATALOGO.'</td>
			    <td>'.$row->PREPARACION.'</td>
			    <td>'.$row->COLECTOR.'</td>
		    </tr>
		    <tr bgcolor="#F9F7F7" >
			    <td width="157" class="title">Número de    colector</td>
			    <td width="288" class="title">Identificado    por</td>
			    <td width="270" class="title">Comentarios del    registro biológico</td>
			    <td width="141" class="title">Fecha del    evento</td>
			    <td width="84" class="title">País</td>
			    <td width="117" class="title">Departamento</td>
			    <td width="84" class="title">Municipio</td>
			    <td width="84" class="title">Localidad</td>
		    </tr>
		    <tr>
			    <td>'.$row->NUMCOLECTOR.'</td>
			    <td>'.$row->IDENTIFICADOPOR.'</td>
			    <td>'.$row->COMENTARIOSREG.'</td>
			    <td>'.$row->FECHAEVENTO.'</td>
			    <td>'.$row->PAIS.'</td>
			    <td>'.$row->DEP.'</td>
			    <td>'.$row->MUN.'</td>
			    <td>'.$row->LOC.'</td>
		    </tr>
		    <tr bgcolor="#F9F7F7" >
			    <td width="125" class="title">Latitud decimal</td>
			    <td width="125" class="title">Longitud decimal</td>
			    <td width="125" class="title">Datum geodésico</td>
			    <td width="125" class="title">Elevación mínima    en metros</td>
			    <td width="201" class="title">Elevación    máxima en metros</td>
			    <td width="201" class="title">Profundidad    mínima en metros</td>
			    <td width="201" class="title">Profundidad    máxima en metros</td>
			    <td width="201" class="title">Comentarios de    la ubicación</td>
		    </tr>
		    <tr >
			    <td>'.$row->LATITUDDECIMAL.'</td>
			    <td>'.$row->LONGINTUDDECIMAL.'</td>
			    <td>'.$row->DATUMGEODESICO.'</td>
			    <td>'.$row->ELEVMINIMA.'</td>
			    <td>'.$row->ELEVMAX.'</td>
			    <td>'.$row->PROFMIN.'</td>
			    <td>'.$row->PROFMAX.'</td>
			    <td>'.$row->COMENTARIOSUBICACION.'</td>
		    </tr>
		    <tr bgcolor="#F9F7F7" >
			    <td width="157" class="title">Información    retenida</td>
			    <td width="336" class="title">Nombre    científico</td>
			    <td width="171" class="title">Categoría del    taxón</td>
			    <td width="147" class="title">Número de    individuos</td>
			    <td width="237" class="title">Calificador de    la identificación</td>
			    <td width="251" class="title">Comentarios de    la Identificación</td>
			    <td width="66" class="title">Reino</td>
			    <td width="120" class="title">Filo</td>
		    </tr>
		    <tr>
			    <td>'.$row->INFORETENIDA.'</td>
			    <td>'.$row->NOMBRECIENTIFICO.'</td>
			    <td>'.$row->TAXON.'</td>
			    <td>'.$row->NUMINDS.'</td>
			    <td>'.$row->CALIFIDENTIFICACION.'</td>
			    <td>'.$row->COMENTARIOSIDENT.'</td>
			    <td>'.$row->REINO.'</td>
			    <td>'.$row->FIL.'</td>
		    </tr>
		    <tr bgcolor="#F9F7F7" >
			    <td width="108" class="title">Clase</td>
			    <td width="158" class="title">Orden</td>
			    <td width="159" class="title">Familia</td>
			    <td width="153" class="title">Género</td>
			    <td width="138" class="title">Epíteto    específico</td>
			    <td width="164" class="title">Epíteto    infraespecífico</td>
			    <td width="129" class="title">Nombre común</td>
			    <td width="129" class="title">Foto</td>
		    </tr>
		    <tr>
			    <td>'.$row->CLAS.'</td>
			    <td>'.$row->ORD.'</td>
			    <td>'.$row->FAM.'</td>
			    <td>'.$row->GEN.'</td>
			    <td>'.$row->EPITETO.'</td>
			    <td>'.$row->EPITIF.'</td>
			    <td>'.$row->NOMBRECOMUN.'</td>
			    ';
			    if($row->FOTO==""){
			    	echo '<td>sin foto</td>';
			    }else{
			    	echo '<td><a href="'.base_url().$row->FOTO.'" target="_blank"><font color="blue">VER/DESCARGAR</font></a></td>';
			    }
			    echo'
		    </tr>
		</table><br /><br /><br />
		
		<div id="edit" class="edit_btn" especimen="'.$row->ESPECIME_ID.'" >Editar</div>	
			<div id="delete" class="myButton"  especimen="'.$row->ESPECIME_ID.'" >Eliminar</div><br /><br />
		<form>
		Agregar foto: <input type="file" name="file" ><br />
		<input type="hidden" name="especimenId" value="'.$row->ESPECIME_ID.'">
		</form>
				</div>';
	}


}
