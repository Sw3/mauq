<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>
	sources/css/styles.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>
	sources/css/busqueda.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>
	sources/Jquery/main.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>
	sources/Jquery/educacion.js"></script>
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
				<a href="<?php echo base_url(); ?>index.php/welcome/registro"><div class="menuItem">Nuevo Especimen</div></a>
				<a href="<?php echo base_url(); ?>index.php/welcome/busqueda"><div class="menuItem">Búsqueda</div></a>
				<a href="<?php echo base_url(); ?>index.php/welcome/educacion"><div class="menuItem">Educación</div></a>
				<a href="<?php echo base_url(); ?>index.php/welcome/publico"><div class="menuItem">Información pública</div></a>
				<a href="<?php echo base_url(); ?>index.php/welcome/reportes"><div class="menuItem">Reportes</div></a>
			</div>
		</div>
	<div id="trabajo">
	<div id="educacioncontent">
		
			<h3>Ingresar nuevo recurso educativo</h2>
		<div class="Nuevorecurso"> 
		<form method="POST" action="<?php echo base_url(); ?>index.php/admin/nuevoRecurso" enctype="multipart/form-data">
			<table>
			    <tr>
			      <td width="163"><label for="NomRec">Nombre del recuso</label></td>
			      <td width="296"><input type="text" name="NomRec" id="NomRec" /></td>
			    </tr>
			    <tr>
			      <td><label for="decrec">Descripción del recurso</label></td>
			      <td><textarea name="decrec" id="decrec" cols="45" rows="5"></textarea></td>
			    </tr>
			    <tr>
			      <td>Recurso</td>
			      <td><input type="file" name="recurso" id="recurso" /></td>
			       <input name="action" type="hidden" value="upload" />
			    </tr>
			    <tr>
			      <td></td>
			      <td><input type="submit" value="Ingresar" name=""></td>
			    </tr>
			 </table>
			 </form>
		</div>
		<h3>Administrar recursos actuales</h2>
		<div class="Nuevorecurso" id="tablarecs"> 
			
		</div>
	</div>
	</div>

	<div class="editRecurso">
		
		
			<table>
			    <tr>
			      <td width="163"><label for="NomRec">Nombre del recuso</label></td>
			      <td width="296"><input type="text" name="EdNomRec" id="NomRec" /></td>
			    </tr>
			    <tr>
			      <td><label for="decrec">Descripción del recurso</label></td>
			      <td><textarea name="decrec" id="Eddecrec" cols="45" rows="5"></textarea></td>
			    </tr>
			    
			    <tr>
			      <td></td>
			      <td><a class="edit_btn"> Guardar Cambios</a><a class="edit_btn" id="cancel"> Cancelar</a></td>
			    </tr>
			 </table>
			 
		
	</div>
	<div class="lgin" id="closeSession">Cerrar sesión</div>
	<div id="footer" name='<?php echo base_url(); ?>'>
		<div id="cent">
			<div class="leftp">
			Universidad del Quindío<br>
			Carrera 15 Calle 12- Armenia, Quindío<br>
			Bloque de Ciencias básicas y tecnológicas
			</div>
			<div class="leftp">
				Conmutador (6) 746 01 11 Ext.147<br>
				www.uniquindio.edu.co<br>
				E-mail: pbiologia@uniquindio.edu.co | amgiraldo@uniquindio.edu.co
			</div>
		</div>
	</div>
</body>
</html>