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
			<a href="<?php echo base_url(); ?>index.php/welcome/educacion"><div class="menuItem">Zona pública</div></a>
			<a href="<?php echo base_url(); ?>index.php/welcome/reportes"><div class="menuItem">Reportes</div></a>
		</div>
	</div>


	<div id="expl">
	<div id="m2"> 
		<div class="menuItem1" id="p1"><li>Página Inicial</li></div>
		<div class="menuItem1" id="p2"><li>Explora</li></div>
		<div class="menuItem1" id="p3"><li>Protocolos</li></div>
		<div class="menuItem1" id="p4"><li>El museo</li></div>
		<div class="menuItem1" id="p5"><li>Recursos educativos</li></div>
	</div>
	<br />
	</div>


		<center><h3>Modificar Zona Pública </h3></center>
		<div class="sec" id="gavs"><h3>Explora</h3></div>
		<div class="sec" id="inicial"><h3>pagina inicial</h3>
		<textarea cols="100" rows="20" id="iniciocontent"></textarea> <br />
		<div class="Btns" id="updinicio"> Gurdar cambios</div>
		</div>
		<div class="sec" id="educa"><h3>Recursos educativos</h3>
		<textarea cols="100" rows="20" id="educatext"></textarea> <br />
		<div class="Btns" id="updeducativos"> Gurdar cambios</div>

		<h3>Ingresar nuevo recurso educativo</h2>
		<div class="Nuevorecurso"> 
		<form method="post" id="recursos" enctype="multypart/form-data">
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
			      <td><input type="file" name="recurso"><input type="hidden" name="ruta" value="Recs/">
			    </tr>
			    <tr>
			      <td></td>
			      <td><div id="registrar" class="edit_btn" >Registrar este recurso</div></td>
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
			      <td width="296"><input type="text" name="nnombre" id="nnombre" /></td>
			    </tr>
			    <tr>
			      <td><label for="decrec">Descripción del recurso</label></td>
			      <td><textarea name="ndesc" id="ndesc" cols="45" rows="5"></textarea></td>
			    </tr>
			    
			    <tr>
			      <td></td>
			      <td><a class="edit_btn" id="confirma"> Guardar Cambios</a><a class="edit_btn" id="cancel"> Cancelar</a>
			      <input type="hidden" name="ref" id="ref">
			      </td>
			    </tr>
			 </table>
			 
		
	</div>


		</div>
		<div class="sec" id="deps"><h3>Protocolos</h3>

		<textarea cols="100" rows="20" id="protocoloscontent"></textarea> <br />
		<div class="Btns" id="updprotocolos"> Gurdar cambios</div>

		<h3>Ingresar nuevo Documento de protocolo</h2>
		<div class="Nuevorecurso"> 
		<form method="post" id="proto" enctype="multypart/form-data">
			<table>
			    <tr>
			      <td width="163"><label for="NomProt">Nombre del recuso</label></td>
			      <td width="296"><input type="text" name="NomProt" id="NomProt" /></td>
			    </tr>
			    <tr>
			      <td><label for="descProt">Descripción del recurso</label></td>
			      <td><textarea name="descProt" id="descProt" cols="45" rows="5"></textarea></td>
			    </tr>
			    <tr>
			      <td>Recurso</td>
			      <td><input type="file" name="filep"><input type="hidden" name="ruta" value="Recs/">
			    </tr>
			    <tr>
			      <td></td>
			      <td><div id="registrarProtocolo" class="edit_btn" >Registrar este protocolo</div></td>
			    </tr>
			 </table>
			 </form>
		</div>
		<h3>Administrar protocolos actuales actuales</h2>
		<div class="Nuevorecurso" id="tablaProts"> 
			
		</div>
	</div>

	</div>


		</div>
		<div class="sec" id="museo"><h3>El museo</h3>
		<textarea cols="100" rows="20" id="museocontent"></textarea> <br />
		<div class="Btns" id="updmuseo"> Gurdar cambios</div></div>
	<br /> 
	<br /> 
	<br /> 
	<br /> 
<div id="sombra"></div>
		

		<div class="pup">
		<br />
		<br />
	<center><form method="post" id="formulario" enctype="multypart/form-data"><table>
				<tr><th>Foto</th>
					<th>Nombre del cajón</th>
					<th>Descripción</th>
					
					<th>Cambiar la foto</th>
					
				</tr>
				<tr>
				<td><img src="<?php echo base_url(); ?>" height="150" class="currentimg"></td>
				<td><input type="text" name="nombre" required="true">
				<input name="ident" type="hidden"  id="cjnid"/></td>
				<td><input type="text" name="desc" required="true"></td>
				
				<td><input type="file" name="file">
				<input type="hidden" name="ruta" value="Exp/"></td>
				</tr>

			</table>
			<div class="Btns" id="cancel">Cancelar</div>
			<div class="Btns" id="guardar"> guardar información</div>
			</form></center>
			
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