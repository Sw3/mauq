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
		<script type="text/javascript" src="<?php echo base_url();?>
	sources/Jquery/admin.js"></script>
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
	<div id="trabajo">
	<div id="educacioncontent">
		
			<h3>Ingresar nuevo recurso educativo</h2>
		<div class="Nuevorecurso"> 
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
			    </tr>
			    <tr>
			      <td></td>
			      <td><input type="button" value="Ingresar" name=""></td>
			    </tr>
			 </table>
		</div>
		<h3>Administrar recursos actuales</h2>
		<div class="Nuevorecurso"> 
			 <table >
			    <tr>
			      <td>Enalce</td>
			      <td>Nombre</td>
			      <td>Descripción</td>
			      <td>Visible</td>
			      <td>fecha de modificacion</td>
			      <td>Eliminar</td>
			      <td>Editar</td>
			    </tr>
			    <tr>
			      <td>Libro Mariposas</td>
			      <td>Libro para niños de primaria</td>
			      <td>/lib1.pdf</td>
			      <td><input type="checkbox" name="act" id="act" />
			      <label for="act"></label></td>
			      <td>19/09/2016</td>
			      <td><input type="submit" name="Eliminar" id="Eliminar" value="Eliminar" /></td>
			      <td><input type="submit" name="Editar" id="Editar" value="Editar" /></td>
			    </tr>
			    <tr>
			      <td>Libro Cucarrones</td>
			      <td>Libro para niños de secundaria</td>
			      <td>/lib2.pdf</td>
			      <td><input type="checkbox" name="act2" id="act2" />
			        <label for="act2"></label></td>
			      <td>1/09/2016</td>
			      <td><input type="submit" name="Eliminar2" id="Eliminar3" value="Eliminar" /></td>
			      <td><input type="submit" name="Editar" id="Editar" value="Editar" /></td>
			    </tr>
			    <tr>
			      <td>&nbsp;</td>
			      <td>&nbsp;</td>
			      <td>&nbsp;</td>
			      <td>&nbsp;</td>
			      <td>&nbsp;</td>
			      <td>&nbsp;</td>
			      <td>&nbsp;</td>
			    </tr>
			  </table>
		</div>
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
</body>
</html>