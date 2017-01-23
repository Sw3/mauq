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
			<a href="<?php echo base_url(); ?>index.php/welcome/registro"><div class="menuItem">Nuevo Especimen</div></a>
			<a href="<?php echo base_url(); ?>index.php/welcome/busqueda"><div class="menuItem">Búsqueda</div></a>
			<a href="<?php echo base_url(); ?>index.php/welcome/educacion"><div class="menuItem">Educación</div></a>
			<a href="<?php echo base_url(); ?>index.php/welcome/publico"><div class="menuItem">Información pública</div></a>
			<a href="<?php echo base_url(); ?>index.php/welcome/reportes"><div class="menuItem">Reportes</div></a>
		</div>
	</div>
	<center>
		<h3> Reportes 
		<a href="<?php echo base_url(); ?>index.php/admin/dbdatas"><div class="Btns">Descargar el consolidado en excel</div></a>

		</h3>

		<form method="post" id="formulario" enctype="multypart/form-data">
		subir imagen: <input type="file" name="file">
		<input type="text" name="nom">
		<input type="hidden" name="ruta" value="Exp/">
		<a class="env"> enviar </a>
</form>
	</center>

	</div>
		
		</div>
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
		</div>
</body>
</html>