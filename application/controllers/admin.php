<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller 
{
	//Función que ingresa un nuevo registro de especimen en la base de datos 
	public function registrar()
		{
			//Crea el array a ingresar con los datos recibidos por POST
		$this->load->database();
		$ARR = array(
	   'ACREDITACION' => strtoupper($_POST[1]) ,
	   'IDREGBIOLOG' => strtoupper($_POST[2]) ,
	   'NUMERORNC' => '94',
	   'NUMEROCATALOGO' =>  strtoupper($_POST[3]),
	   'PREPARACION' => strtoupper( $_POST[4]) ,
	   'COLECTOR' =>  strtoupper($_POST[5]),
	   'IDENTIFICADOPOR' =>  strtoupper($_POST[6]),
	   'FECHAEVENTO' => $_POST[7] ,
	   'PAIS' => strtoupper($_POST[8]),
	   'DEP' => strtoupper($_POST[9]) ,
	   'MUN' =>  strtoupper($_POST[10]),
	   'LOC' =>  strtoupper($_POST[11]) ,
	   'LATITUDDECIMAL' =>  strtoupper($_POST[12]),
	   'LONGINTUDDECIMAL' =>  strtoupper($_POST[13]), 
	   'ELEVMINIMA' => $_POST[14],
	   'NOMBRECIENTIFICO' => "",
	   'TAXON' =>  strtoupper($_POST[16]),
	   'NUMINDS' => $_POST[17] ,
	   'CLAS' =>  strtoupper($_POST[18]),
	   'ORD' => strtoupper( $_POST[19]),
	   'FAM' =>  strtoupper($_POST[20]),
	   'GEN' =>  strtoupper($_POST[21]),
	   'EPITETO' =>  strtoupper($_POST[22]),
	   'NOMBRECOMUN' => "SD",
	   'REINO' => "ANIMAL",
	   'COMENTARIOSIDENT' => "SD",
	   'INFORETENIDA' => "SD",
	   'COMENTARIOSUBICACION' => "SD",
	   'CALIFIDENTIFICACION' => "SD",
	   'PROFMIN' => 0,
	   'ELEVMAX' => $_POST[15],
	   'DATUMGEODESICO' => "SD",
	   'COMENTARIOSREG' => "SD",
	   'NUMCOLECTOR' => 0,
	   'COLECCION' => "MAUQ",
	   'TIPOMUES' => "SD",
	   'EPITIF' => "SD",
	   'NIT' => "890.000.432-8",
	   'NOMBREENTIDAD' => "UNIVERSIDAD DEL QUINDIO",
	   'PROFMAX' => 0,
	   'TIPOREG' => "SD",
	   'FIL' => "arthropoda");
		//Ingreso a la base de datos
			try{
				$this->db->insert('REGISTRO', $ARR);
				echo "Se ha registrado con éxito!";
			}catch(Exception $e){
				echo "Hubo un problema: ".$e;
			}
		
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
	//Función que verifica la validéz de una fecha
	public function validarFecha()
	{
		try{	
			$FECH= explode("/",$_POST[1] );
		 	if(sizeof($FECH)>1){
				if(checkdate ( $FECH[1] , $FECH[0] , $FECH[2] )){
						if($FECH[2]>'1900'){
						echo "ok";
						}else{
							echo "La fecha es inválida";
						}					
					}else{
						echo "La fecha es inválida";
						}
					}else{
						echo "La fecha es inválida";
					}
		}catch(Exception $e){
			echo "La fecha es inválida";
		}				 
	}
	//Función que regorna los elementos para construir un combobox en el módulo de registro
	 //$_POST[1] tiene el nombre de la tabla a consultar
	 //$_POST[2] tiene el id del elemento
	 //$_POST[3] tiene el id de la tabla de la bd
	 //$_POST[4] tiene el el valor para el elemento en la lista
	public function comboBox(){
	$this->load->database();
	$this->db->order_by($_POST[4], "asc");
	$query = $this->db->get($_POST[1]);

	echo '<select id="'.$_POST[2].'">';
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
		echo "	<br />
	<br />
	<br />
	<br />
	<br />";
		}
		
	}
	/*FUNCIONES PARA EL MODULO DE RECURSOS EDUCATIVOS*/	
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
			      <td><a class="edit_btn">Editar</a></td>
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

	//Función para mostrar detalle de registro en módulo de búsqueda
	function detalle()
	{
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
			    <td width="129" colspan="2" class="title">Nombre común</td>
		    </tr>
		    <tr>
			    <td>'.$row->CLAS.'</td>
			    <td>'.$row->ORD.'</td>
			    <td>'.$row->FAM.'</td>
			    <td>'.$row->GEN.'</td>
			    <td>'.$row->EPITETO.'</td>
			    <td>'.$row->EPITIF.'</td>
			    <td colspan="2">'.$row->NOMBRECOMUN.'</td>
		    </tr>
		</table>
				</div>';
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

	//Función para mostrar las gavetas en la parte de administración
	public function GavetasUser(){
		$this->load->database();
		$this->db->order_by('ORD', 'asc');
		$query = $this->db->get('GAVETAS');
		
		$gavetaActual = 1;
		echo '<table id="tb">
		<tr>
		<td><div class="abt">
		<div class="abrir" id="g'.$gavetaActual.'"></div>
		<div class="gaveta"> ';
		foreach ($query->result() as $key) {
			if((int)(($key->ORD)/100)>$gavetaActual){
				echo '</div>
						</div>
						</td>
						<td>'; //finaliza la gaveta
				$gavetaActual = (int)(($key->ORD)/100); //inicia la nueva gaveta
				echo '<td><div class="abt">
						<div class="abrir" id="g'.$gavetaActual.'"></div>
						<div class="gaveta"> 
						<div class="cajon" name="'.$key->NUM_CAJON.'" g="g'.$gavetaActual.'">'.$key->NOM.'</div>';
			
			
			}else{
				echo '<div class="cajon" name="'.$key->NUM_CAJON.'"  g="g'.$gavetaActual.'">'.$key->NOM.'</div>'; //agrega un cajon a la gaveta actual
			}
		}
		echo '</div>
				</div>
				</td>
				</table>
				</div>';
		
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
	
	public function generaRep(){
		$this->load->database();
		$this->load->library('excel'); //carga libreria
		$this->excel->setActiveSheetIndex(0); //activa la hoja de trabajo
		$this->excel->getActiveSheet()->setTitle('test worksheet'); //Titulo de la hoja de trabajo
		$this->excel->getActiveSheet()->setCellValue('A1', 'This is just some text value'); //escribe en A1

		//canbio de formatos de texto fondos... etc
		//change the font size
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
		//make the font become bold
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		//merge cell A1 until D1
		$this->excel->getActiveSheet()->mergeCells('A1:D1');
		//set aligment to center for that merged cell (A1 to D1)
		$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$filename='just_some_random_name.xls'; //nombre del archivo xls
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');  
		$objWriter->save('php://output');
	}
	public function dbdatas(){
		//load our new PHPExcel library
        $this->load->library('excel');
        //activate worksheet number 1
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Users list');
 
        // load database
        $this->load->database();
 
        // load model
        $this->load->model('EspecimenModel');
 
        // get all users in array formate
        $users = $this->EspecimenModel->getData();
 
        // read data to active sheet
        $this->excel->getActiveSheet()->fromArray($users);
 		$this->excel->getActiveSheet()->setAutoFilter('A1:AQ1'); //Agrega los filtros a la columna de titulos

        $filename='MAUQ_Coleccion_94_ U_del_Quindio_Sistematizacion.xls'; //save our workbook as this file name
 
        header('Content-Type: application/vnd.ms-excel'); //mime type
 
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
 
        header('Cache-Control: max-age=0'); //no cache
                    
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5'); 
 
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
	}
}
