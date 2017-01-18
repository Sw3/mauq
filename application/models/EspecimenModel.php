<?php
class EspecimenModel extends CI_Model{

public function getData(){
	$query = $this->db->get('REGISTRO');

	$query->result();
	$ret = array();
	$row=3;
	array_push($ret, array("institutionCode","institutionID","dynamicProperties","basisOfRecord","preparations","occurrenceID","collectionCode","collectionID","catalogNumber","preparastions","recordedBy","recordNumber","identifiedBy","occurrenceRemarks","eventDate","country","stateProvince","county","locality","decimalLatitude","decimalLongitude","geodeticDatum","minimumElevationInMeters","maximumElevationInMeters","minimumDepthInMeters","maximumDepthInMeters","locatioemarks","dataGeneralizations","scientificName","taxoank","individualCount","identificationQualifier","identificatioemarks","kingdom","phylum","class","order","family","genus","SD","specificEpithet","infraspecificEpithet","vernacularName") ); //valores por defecto del archivo

	array_push($ret, array("Nombre de la entidad","NIT","Acreditación del origen del especímen","Tipo del registro","Tipo de la muestra","ID del registro biológico","Nombre de la colección","Número RNC","Número de catálogo","Preparaciones","Nombre del colector","Número de colector","Identificado por","Comentarios del registro biológico","Fecha del evento","País","Departamento","Municipio","Localidad","Latitud decimal","Longitud decimal","Datum geodésico","Elevación mínima en metros","Elevación máxima en metros","Profundidad mínima en metros","Profundidad máxima en metros","Comentarios de la ubicación","Información retenida","Nombre científico","Categoría del taxón","Número de individuos","Calificador de la identificación","Comentarios de la Identificación","Reino","Filo","Clase","Orden","Familia","Género","SD","Epíteto específico","Epíteto infraespecífico","Nombre común") ); //Titulos de las columnas

	foreach ($query->result() as $key) {

		array_push($ret, array( "Universidad del Qundío", "890.000.432-8", 
			$key->ACREDITACION,
			$key->TIPOREG,
			$key->TIPOMUES,
			$key->IDREGBIOLOG,
			"MAUQ",
			$key->NUMERORNC,
			$key->NUMEROCATALOGO,
			$key->PREPARACION,
			$key->COLECTOR,
			$key->NUMCOLECTOR,
			$key->IDENTIFICADOPOR,
			$key->COMENTARIOSREG,
			$key->FECHAEVENTO,
			$key->PAIS,
			$key->DEP,
			$key->MUN,
			$key->LOC,
			$key->LATITUDDECIMAL,
			$key->LONGINTUDDECIMAL,
			$key->DATUMGEODESICO,
			$key->ELEVMINIMA,
			$key->ELEVMAX,
			$key->PROFMIN,
			$key->PROFMAX,
			$key->COMENTARIOSUBICACION,
			$key->INFORETENIDA,
			"NOMBREC",
			$key->TAXON,
			$key->NUMINDS,
			$key->CALIFIDENTIFICACION,
			$key->COMENTARIOSIDENT,
			"Animal",
			"arthropoda",
			$key->CLAS,
			$key->ORD,
			$key->FAM,
			$key->GEN,
			"SD",
			$key->EPITETO,
			$key->EPITIF,
			$key->NOMBRECOMUN,
			) );
			$row++;
	}
	 return $ret;
}
}
?>