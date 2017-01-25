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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url();?>
	sources/Jquery/reportes.js"></script>
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
			<a href="<?php echo base_url(); ?>index.php/welcome/publico"><div class="menuItem">Zona pública</div></a>
			<a href="<?php echo base_url(); ?>index.php/welcome/reportes"><div class="menuItem">Reportes</div></a>
		</div>
	</div>
	<center>
		<h3> Reportes 
		</h3>
		<br />
		<br />
		<br />

<table width="60%" id="rep">
	<tr >
		<th>Título</th>
		<th>Información</th>
		<th>Acciones</th>

		</tr>
		</tr>
		<tr>
		<td>Cantidad de especimenes registrados</td>
		<td id="inds"></td>
	</tr>
		<tr>
		<td>Archivo consolidado en excel</td>
		<td>Formato Von Humbold</td>
		<td><a href="<?php echo base_url(); ?>index.php/admin/dbdatas"><div class="edit_btn">Descargar</div></a></td>
	</tr>
	
	</tr>
		<tr>
		<td>Fechas erróneas</td>
		<td id="cf"></td>
		<td id="bt"><div class="edit_btn" id="corregir">Corregir</div></td>
	</tr>
</table>
<div id="detalle">

<div id="sombra"></div>
	</center>
	</div>
		
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
		</div>
</body>
</html>