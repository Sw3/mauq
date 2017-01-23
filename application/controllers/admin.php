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
	   'FIL' => "arthropoda",
	   'FOTO' => strtoupper($_POST[23])
	   );
		//Ingreso a la base de datos
			try{
				$this->db->insert('REGISTRO', $ARR);
				//echo "Se ha registrado con éxito!";
				echo $this->db->last_query();
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
	//Función para mostrar las gavetas al publico
	public function GavetasUser(){
		$this->load->database();
		$this->db->order_by('ORD', 'asc');
		$query = $this->db->get('GAVETAS');
		$numCajon = 0;
		$gavetaActual = 1;
		echo '<table id="tb">
		<tr>
		<td><div class="abt">
		<div class="abrir" id="g'.$gavetaActual.'"></div>
		<div class="gaveta"> ';
		foreach ($query->result() as $key) {
			if((int)(($key->ORD)/100)>$gavetaActual){
				$numCajon = 1;
				echo '</div>
						</div>
						</td>
						<td>'; //finaliza la gaveta
				$gavetaActual = (int)(($key->ORD)/100); //inicia la nueva gaveta
				echo '<td><div class="abt">
						<div class="abrir" id="g'.$gavetaActual.'"></div>
						<div class="gaveta"> 
						<div class="cajon" img="'.$key->FOTO.'" name="'.$numCajon.'" g="g'.$gavetaActual.'">'.$key->NOM.'</div>';
			
			
			}else{
				$numCajon++;
				echo '<div class="cajon" img="'.$key->FOTO.'" name="'.$numCajon.'"  g="g'.$gavetaActual.'">'.$key->NOM.'</div>'; //agrega un cajon a la gaveta actual
			}
		}
		echo '</div>
				</div>
				</td>
				</table>
				</div>';
		
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

	public function upload(){
		$file = $_FILES["file"];
		$nombre = $file["name"];
		$rutaprov = $file["tmp_name"];
		$carpeta = $_POST["ruta"];
		$pos = strpos($nombre, ".");
		$ext = substr($nombre, $pos);
			$src = $carpeta.(date("Ynjhis")).$ext;
			move_uploaded_file($rutaprov, $src);
			echo $src;
	}
}
