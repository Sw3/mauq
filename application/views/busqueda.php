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
	sources/Jquery/busqueda.js"></script>
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
	<div id="trabajo"><h3>Búsqueda </h3><div id="pag"></div>

		<div class="filtros"> 
			
			<center>
			<table>
				<tr>
					<td>Categoria: </td>
					<td><select id="flt" width="140" style="width: 140px">
				<option value="TAXON">Categoría de taxón</option>
				<option value="CLAS">Clase</option>
				<option value="ORD">Orden</option>
				<option value="FAM">familia</option>
				<option value="GEN">Género</option>
				<option value="PAIS">Pais</option>
				<option value="DEP">Departamento</option>
				<option value="MUN">Municipio</option>
			</select>
			</td>
				</tr>
				<tr>
					<td>Valor:</td>
					<td id="fl"></td>
				</tr>
			</table>
			</center>
 <div class="Btn_Buscar" id="addFlt">Añadir filtro +</div><br />
			<div class="listafiltro">

			</div>
			<div class="Btn_Buscar" id="bsq">Buscar</div>

		</div>
		<div id="resultados">
				

		</div>
		<div id="btns">
		<div class="bnt_reg" id="ant">Anterior página</div>
		<div class="bnt_reg" id="sgt">Siguiente página</div></div>
	</div>
		<div id="detalle"></div>
		<div id="sombra"> <br /></div>
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