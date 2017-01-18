<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>
	sources/css/styles.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>sources/css/public.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>
	sources/Jquery/main.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>
	sources/Jquery/admin.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>
	sources/Jquery/publico.js"></script>
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
			<a href="<?php echo base_url(); ?>index.php/welcome/educacion"><div class="menuItem">Información pública</div></a>
			<a href="<?php echo base_url(); ?>index.php/welcome/reportes"><div class="menuItem">Reportes</div></a>
		</div>
	</div>


	<div id="expl">
	<div id="m2"> 
		<div class="menuItem1" id="p1"><li>Página Inicial</li></div>
		<div class="menuItem1" id="p2"><li>Explora</li></div>
		<div class="menuItem1" id="p3"><li>Depósito de especímenes</li></div>
		<div class="menuItem1" id="p4"><li>El museo</li></div>
	</div>
	<br />
	</div>


		<center><h3>Modificar Información pública </h3></center>
		<div class="sec" id="gavs"><h3>Explora</h3></div>
		<div class="sec" id="inicial"><h3>pagina inicial</h3>
		<textarea cols="100" rows="20"></textarea> <br />
		<div class="Btns"> Gurdar cambios</div>
		</div>
		<div class="sec" id="deps"><h3>Deposito de especimenes</h3>

		<textarea cols="100" rows="20"></textarea> <br />
		<div class="Btns"> Gurdar cambios</div>

		</div>
		<div class="sec" id="museo"><h3>El museo</h3>
		<textarea cols="100" rows="20"></textarea> <br />
		<div class="Btns"> Gurdar cambios</div></div>
	<br /> 
	<br /> 
	<br /> 
	<br /> 
<div id="sombra"></div>
		<div class="pup">
		<br />
		<br />
	<center><form method="POST" action="<?php echo base_url(); ?>/index.php/admin/cajon" enctype="multipart/form-data"><table>
				<tr>
					<th>Nombre del cajón</th>
					<th>Descripción</th>
					<th>Foto</th>
				</tr>
				<tr>
				<td><input type="text" name="nombre" required="true">
				<input name="ident" type="hidden"  id="cjnid"/></td>
				<td><input type="text" name="desc" required="true"></td>
				<td><input type="file" name="recurso" id="recurso" required="true">
				 <input name="action" type="hidden" value="upload" /></td>
				</tr>

			</table>
			<div class="Btns" id="cancel">Cancelar</div>
			<input type="submit" value="Guardar cambios" class="Btns">
			</form></center>
			
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