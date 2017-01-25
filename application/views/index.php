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
	sources/Jquery/NuevoEspecimen.js"></script>
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
	<div id="inf_pbl"><h3>Registro de nuevo Especimen</h2>

		<div class="panel1" id="1">
					<table  border="0">
						<tr height="40">
					      <td>Acreditación de origen del especimen</td>
					      <td id="cb1" width="650px"></td>
					      <td>&nbsp;</td>
					      <td>&nbsp;</td>
					    </tr>
					      <td>Id del registro biológico</td>
					      <td><input type="text" name="idRegBio" id="idRegBio" width="200" style="width: 200px"/></td>
					      <td>&nbsp;</td>
					      <td>&nbsp;</td>
					    </tr>
					    <tr height="40">
					      <td width="216">Número de catálogo</td>
					      <td width="247"><input type="text" name="NumCat" id="NumCat" width="200" style="width: 200px"/></td>
					    </tr>	
					     <tr height="40">
						      <td>Fecha del evento</td>
						      <td><input type="text" name="fecha" id="fecha" required="true" width="200" style="width: 200px" /><div id="fval"></div></td>
						    </tr>						    
					   <tr height="40">
					      <td><label for="Preparaciones">Preparaciones</label></td>
					      <td id="cb2">
					      </select></td>
						    <tr>
						      <td><label for="NomColector">Nombre del colector</label></td>
						      <td><input type="text" name="NomColector" id="NomColector" width="200" style="width: 200px"/></td>
						    </tr>
							<tr height="40">
						      <td>Identificado por</td>
						      <td><input type="text" name="IdentificadoPor" id="IdentificadoPor" width="200" style="width: 200px" /></td>
						    </tr>					    
					    </tr>	

					</table>	
	

		</div>	<br/>							
			<div class="panel1" id="2">
				<table border="0">
				    <tr height="40">
				      <td width="216">Pais</td>
				      <td id="cb8"></td>
				    </tr>
				   <tr height="40">
				      <td><label for="Preparaciones">Departamento</label></td>
				     <td id="cb9"></td>
				      </select></td>
				    </tr>
				    <tr>
				      <td><label for="NomColector">Municipio</label></td>
				      <td id="cb10"></td>
				    </tr>
				    <tr height="40">
				      <td>Localidad</td>
				      <td id="cb11"></td>
				    </tr>
				    <tr height="40">
				      <td>Latitud decimal</td>
				      <td><input type="text" name="lat" id="lat" width="200" style="width: 200px"/></td>
				    </tr>
				  	<tr height="40">
				      <td><label for="ComsReg">Longitud decimal</label></td>
				      <td><input type="text" name="lon" id="lon" cols="45" rows="5" width="200" style="width: 200px"></textarea></td>
				    </tr>
				    <tr height="40">
				      <td><label for="ComsReg">Elevación mínima en metros</label></td>
				      <td><input type="number" name="elevmin" id="elevmin" cols="45" rows="5" width="200" style="width: 200px"></textarea></td>
				    </tr>
				  </table>
			</div>
			<div class="panel1" id="3">
				<table border="0">
				    <tr height="40">
				      <td width="216">Elevación máxima (Mts)</td>
				      <td width="247"><input type="number" name="elevmax" id="elevmax" width="200" style="width: 200px"/></td>
				    </tr>
				    <tr>
				      <td><label for="NomColector">Categoría del taxón</label></td>
				      <td id="cb3"></td>
				    </tr>
				    <tr height="40">
				      <td>Numero de individuos</td>
				      <td><input type="number" name="num" id="num" width="200" style="width: 200px" /></td>
				    </tr>
				    <tr height="40">
				      <td>Clase</td>
				      <td id="cb4"></td>
				    </tr>
				  	<tr height="40">
				      <td><label for="ComsReg">Orden</label></td>
				      <td id="cb5"></textarea></td>
				    </tr>
				    <tr height="40">
				      <td><label for="ComsReg">Familia</label></td>
				      <td id="cb6"></textarea></td>
				    </tr>
				    <tr height="40">
				      <td><label for="ComsReg">Género</label></td>
				      <td id="cb7"></td>
				    </tr>
				    <tr height="40">
				      <td><label for="ComsReg">Epíteto Específico</label></td>
				      <td><input type="text" name="ep" id="ep" cols="45" rows="5" width="200" style="width: 200px"></textarea></td>
				    </tr>
				    <tr height="40">
				      <td><label for="ComsReg">Foto</label></td>
				      <td><form method="post" id="formulario" enctype="multypart/form-data">
					<input type="file" name="file"><input type="hidden" name="ruta" value="Especimenes/">
					</form></td>
				    </tr>
				  </table>
			</div>
			<center><div class="bnt_reg" id="reg">Regresar</div>
					<div class="bnt_reg" id="sig">Continuar</div>
					<div class="bnt_reg" id="fin">Terminar</div></center>

		</div> 
	</center>

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