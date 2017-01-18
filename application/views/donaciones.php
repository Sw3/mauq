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
			<a href="<?php echo base_url(); ?>index.php/welcome/museo"><div class="menuItem">El Museo</div></a>
			<a href="<?php echo base_url(); ?>index.php/welcome/explora"><div class="menuItem">Explora</div></a>
			<a href="<?php echo base_url(); ?>index.php/welcome/donaciones"><div class="menuItem">Depositar especimen</div></a>
			<a href="<?php echo base_url(); ?>index.php/welcome/visitas"><div class="menuItem">Visitas</div></a>
		</div>
	</div>
	<div id="expl">
	<div id="educacioncontent">
	<table id="tb">
		<tr>
		<td>
		<div class="abt">
		<div class="abrir" id="g1">gaveta</div>
			<div class="gaveta"> 
			<div class="cajon" name="1" g="g1"> 1 </div>
			<div class="cajon" name="2" g="g1"> 2 </div>
			<div class="cajon" name="3" g="g1"> 3 </div>
			<div class="cajon" name="4" g="g1"> 4 </div>
			<div class="cajon" name="5" g="g1"> 5 </div>
			<div class="cajon" name="6" g="g1"> 6 </div>
			<div class="cajon" name="7" g="g1"> 7 </div>
			<div class="cajon" name="8" g="g1"> 8 </div>
			</div>
		</div>
		</td>
		<td>
			<div class="abt">
		<div class="abrir" id="g2">gaveta</div>
			<div class="gaveta"> 
			<div class="cajon" name="1" g="g2"> 1 </div>
			<div class="cajon" name="2" g="g2"> 2 </div>
			<div class="cajon" name="3" g="g2"> 3 </div>
			<div class="cajon" name="4" g="g2"> 4 </div>
			</div>
		</div>
		</td>
		<td>
			<div class="abt">
		<div class="abrir" id="g3">gaveta</div>
			<div class="gaveta"> 
			<div class="cajon" name="1" g="g3"> 1 </div>
			<div class="cajon" name="2" g="g3"> 2 </div>
			<div class="cajon" name="3" g="g3"> 3 </div>
			<div class="cajon" name="4" g="g3"> 4 </div>
			</div>
		</div>
		</td>
		<td>
			<div class="abt">
		<div class="abrir" id="g4">gaveta</div>
			<div class="gaveta"> 
			<div class="cajon" name="1" g="g4"> 1 </div>
			<div class="cajon" name="2" g="g4"> 2 </div>
			<div class="cajon" name="3" g="g4"> 3 </div>
			<div class="cajon" name="4" g="g4"> 4 </div>
			</div>
		</div>
		</td>
		<td>
			<div class="abt">
		<div class="abrir" id="g5">gaveta</div>
			<div class="gaveta"> 
			<div class="cajon" name="1" g="g5"> 1 </div>
			<div class="cajon" name="2" g="g5"> 2 </div>
			<div class="cajon" name="3" g="g5"> 3 </div>
			<div class="cajon" name="4" g="g5"> 4 </div>
			</div>
		</div>
		</td>
		<td>
			
		<div class="abt">
		<div class="abrir" id="g6">gaveta</div>
			<div class="gaveta"> 
			<div class="cajon" name="1" g="g6"> 1 </div>
			<div class="cajon" name="2" g="g6"> 2 </div>
			<div class="cajon" name="3" g="g6"> 3 </div>
			<div class="cajon" name="4" g="g6"> 4 </div>
			</div>
		</div>
		</td>
	</table>
	</div>	

	<div  class="direccion" id="der"> < </div>
	<div  class="direccion" id="izq"> > </div>
	</div>
	<a href="<?php echo base_url(); ?>index.php/welcome/registro"> <div class="lgin">Iniciar sesion</div></a>
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
</body>
</html>