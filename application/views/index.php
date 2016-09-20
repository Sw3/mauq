<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>
	sources/css/styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>
	sources/Jquery/main.js"></script>
	<title>Mauq</title>
	<style type="text/css">	

	@font-face {
    font-family: 'korinna_btregular';
    src: url('<?php echo base_url(); ?>sources/fonts/fnt-webfont.eot');
    src: url('<?php echo base_url(); ?>sources/fonts/fnt-webfont.eot?#iefix') format('embedded-opentype'),
         url('<?php echo base_url(); ?>sources/fonts/fnt-webfont.ttf') format('truetype'),
         url('<?php echo base_url(); ?>sources/fonts/fnt-webfont.svg#korinna_btregular') format('svg');
    font-weight: normal;
    font-style: normal;
}
h3 { font-family: 'korinna_btregular', arial, serif; }

	</style>
</head>
<body>
	<div id="header">
	<div id="logo"><img src="<?php echo base_url();?>sources/images/logo.jpg"></div>
	</div>
	<div id="menu">
		<div id="menubar">
			<a href="<?php echo base_url(); ?>index.php/welcome/index"><div class="menuItem">Nuevo Especimen</div></a>
			<a href="<?php echo base_url(); ?>index.php/welcome/educacion"><div class="menuItem">Búsqueda</div></a>
			<a href="<?php echo base_url(); ?>index.php/welcome/educacion"><div class="menuItem">Educación</div></a>
		</div>
	</div>
	<div id="trabajo"><h3>Registro de nuevo Especimen</h2>
		<div id="panel1">
					<table  border="0">
						<tr height="40">
					      <td>Nombre de la entidad</td>
					      <td><input type="text" name="nombreentidad" id="nombreentidad" /></td>
					      <td>Nit.</td>
					      <td><input type="text" name="Nit" id="Nit" /></td>
					    </tr>
					    <tr height="40">
					      <td>Acreditación de origen del especimen</td>
					      <td><input type="text" name="Acreditacion" id="Acreditacion" /></td>
					      <td>&nbsp;</td>
					      <td>&nbsp;</td>
					    </tr>
					    <tr height="40">
					      <td>Tipo de registro</td>
					      <td><input type="text" name="TipoRegistro" id="TipoRegistro" /></td>
					      <td>&nbsp;</td>
					      <td>&nbsp;</td>
					    </tr>
					    <tr height="40">
					      <td>Id del registro biológico</td>
					      <td><input type="text" name="idRegBio" id="idRegBio" /></td>
					      <td>&nbsp;</td>
					      <td>&nbsp;</td>
					    </tr>
					    <tr height="40">
					      <td><label for="nomCol">nombre de la colección</label></td>
					      <td><input type="text" name="nomCol" id="nomCol" /></td>
					      <td>&nbsp;</td>
					      <td>&nbsp;</td>
					    </tr>
					     <tr height="40">
					      <td>numero RNC </td>
					      <td><input type="text" name="NumRNC" id="NumRNC" /></td>
					      <td>&nbsp;</td>
					      <td>&nbsp;</td>
					    </tr>				    
					</table>		  		
		</div>	<br/>	
		<div id="panel1">
			<table border="0">
			    <tr height="40">
			      <td width="216">Número de catálogo</td>
			      <td width="247"><input type="text" name="NumCat" id="NumCat" /></td>
			    </tr>
			   <tr height="40">
			      <td><label for="Preparaciones">Preparaciones</label></td>
			      <td><select name="Preparaciones" id="Preparaciones">
			      </select></td>
			    </tr>
			    <tr>
			      <td><label for="NomColector">Nombre del colector</label></td>
			      <td><input type="text" name="NomColector" id="NomColector" /></td>
			    </tr>
			    <tr height="40">
			      <td>Identificado por</td>
			      <td><input type="text" name="IdentificadoPor" id="IdentificadoPor" /></td>
			    </tr>
			    <tr height="40">
			      <td>Número del colector</td>
			      <td><input type="text" name="numColector" id="numColector" /></td>
			    </tr>
			  	<tr height="40">
			      <td><label for="ComsReg">Comentarios del registro biológico</label></td>
			      <td><textarea name="ComsReg" id="ComsReg" cols="45" rows="5"></textarea></td>
			    </tr>
			  </table>
		</div><br/>
		<div id="panel1">
			<table border="0">
			   <tr height="40">
			      <td width="185"><input type="submit" name="fecha" id="fecha" value="fecha" /></td>
			      <td width="156">&nbsp;</td>
			      <td width="190">&nbsp;</td>
			      <td width="71">&nbsp;</td>
			    </tr>
			    <tr height="40">
			      <td><label for="latDec">Latitud decimal</label></td>
			      <td><input type="text" name="latDec" id="latDec" /></td>
			      <td>&nbsp;</td>
			      <td>&nbsp;</td>
			    </tr>
			    <tr height="40">
			      <td><label for="longDec">Longitud decimal</label></td>
			      <td><input type="text" name="longDec" id="longDec" /></td>
			      <td>&nbsp;</td>
			      <td>&nbsp;</td>
			    </tr>
			    <tr height="40">
			      <td><label for="Datum">Datum geodésico</label></td>
			      <td><input type="text" name="Datum" id="Datum" /></td>
			      <td>&nbsp;</td>
			      <td>&nbsp;</td>
			    </tr>
			    <tr height="40">
			      <td><label for="elevMin">Elevación mínima (metros)</label></td>
			      <td><input type="text" name="elevMin" id="elevMin" /></td>
			      <td><label for="profMin">Profundidad Mínima (metros)</label></td>
			      <td><input type="text" name="profMin" id="profMin" /></td>
			    </tr>
			    <tr height="40">
			      <td><label for="elevMax">Elevación máxima (metros)</label></td>
			      <td><input type="text" name="elevMax" id="elevMax" /></td>
			      <td><label for="ProfMax">Profundidad máxima (metros)</label></td>
			      <td><input type="text" name="ProfMax" id="ProfMax" /></td>
			    </tr>
			    <tr height="40">
			      <td><label for="Comub">comentarios de la Ubicación</label></td>
			      <td><textarea name="Comub" id="Comub" cols="45" rows="5"></textarea></td>
			      <td>&nbsp;</td>
			      <td>&nbsp;</td>
			    </tr>
			    <tr height="40">
			      <td><label for="infoRet">Información retenida</label></td>
			      <td><textarea name="infoRet" id="infoRet" cols="45" rows="5"></textarea></td>
			      <td>&nbsp;</td>
			      <td>&nbsp;</td>
			    </tr>
			  </table>
		</div><br/>
		<div id="panel1">
			<table width="485" border="0">
			    <tr height="40">
			      <td width="203"><label for="NomCient">Nombre Científico</label></td>
			      <td width="272"><input type="text" name="NomCient" id="NomCient" /></td>
			    </tr>
			    <tr height="40">
			      <td><label for="CatTax">Categoria del taxón</label></td>
			      <td><select name="CatTax" id="CatTax">
			      </select></td>
			    </tr>
			    <tr height="40">
			      <td><label for="numInds">Número de individuos</label></td>
			      <td><input type="text" name="numInds" id="numInds" /></td>
			    </tr>
			  </table>
		</div><br/>
		<div id="panel1">
			<table border="0">
			    <tr height="40">
			      <td width="270"><label for="Califid">Calificador de la indentificación</label></td>
			      <td width="213"><input type="text" name="Califid" id="Califid" /></td>
			    </tr>
			    <tr height="40">
			      <td><label for="ComentIden">Comentarios de la identificación</label></td>
			      <td><textarea name="ComentIden" id="ComentIden" cols="45" rows="5"></textarea></td>
			    </tr>
			    <tr height="40">
			      <td>Reino</td>
			      <td>Animal</td>
			    </tr>
			    <tr height="40">
			      <td>Filo</td>
			      <td><input type="text" name="filo" id="filo" /></td>
			    </tr>
			    <tr height="40">
			      <td><label for="clase">Clase</label></td>
			      <td><input type="text" name="clase" id="clase" /></td>
			    </tr>
			    <tr height="40">
			      <td><label for="orden">Orden</label></td>
			      <td><input type="text" name="orden" id="orden" /></td>
			    </tr>
			    <tr height="40">
			      <td><label for="familia">Familia</label></td>
			      <td><input type="text" name="familia" id="familia" /></td>
			    </tr>
			    <tr height="40">
			      <td><label for="genero">Genero</label></td>
			      <td><input type="text" name="genero" id="genero" /></td>
			    </tr>
			    <tr height="40">
			      <td><label for="EpitetoE">Epiteto específico</label></td>
			      <td><input type="text" name="EpitetoE" id="EpitetoE" /></td>
			    </tr>
			    <tr height="40">
			      <td><label for="epitetoI">Epíteto Infraespecífico</label></td>
			      <td><input type="text" name="epitetoI" id="epitetoI" /></td>
			    </tr>
			    <tr height="40">
			      <td><label for="nombreComun">Nombre común</label></td>
			      <td><input type="text" name="nombreComun" id="nombreComun" /></td>
			    </tr>
			  </table>
			  <center><input type="button" value ="registrar" name="registrar"></center>
		</div>


	</div>
<div id="footer">
		<div id="cent">
			<div class="leftp">
			Universidad del Quindío<br>
			Carrera 15 Calle 12- Armenia, Quindío<br>
			Bloque de Ciencias básicas y tecnológicas
			</div>
			<div class="leftp">
				Conmutador (6) 746 01 11 Ext.147<br>
				www.uniquindio.edu.co<br>
				E-mail: pbiologia@uniquindio.edu.co | amgiraldo@uniquindio.edu.com
			</div>
		</div>
	</div>
	</div>
</body>
</html>