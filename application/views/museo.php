<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>
	sources/css/styles.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>sources/css/explora.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>
	sources/Jquery/main.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>
	sources/Jquery/explora.js"></script>
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
			<a href="<?php echo base_url(); ?>index.php/welcome/index"><div class="menuItem">Inicio</div></a>
			<a href="<?php echo base_url(); ?>index.php/welcome/museo"><div class="menuItem">El museo</div></a>
			<a href="<?php echo base_url(); ?>index.php/welcome/explora"><div class="menuItem">Explora</div></a>
			<a href="<?php echo base_url(); ?>index.php/welcome/donaciones"><div class="menuItem">Protocolos</div></a>
			<a href="<?php echo base_url(); ?>index.php/welcome/visitas"><div class="menuItem">Recursos educativos</div></a>
		</div>
	</div>
	<div class="pbl" id="museocontent">



	</div>
		<div class="logBox">
		<table border="0">
			<tr>
				<td>Usuario</td>
				<td><input type="text" id="usr" name="usr"></td>
			</tr>
			<tr>
				<td>Contraseña</td>
				<td><input type="password" id="pass" name="pass"></td>
			</tr>
			<tr>
				<td ></td>
				<td ><a class="acceso">Ingresar</a></td>
			</tr>
		</table>
	</div>
	<div class="lgin">Inico de sesión</div>


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