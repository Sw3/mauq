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
			<a href="<?php echo base_url(); ?>index.php/welcome/visitas"><div class="menuItem">Educación</div></a>
		</div>
	</div>
	<div class="pbl">

	La colección del Museo de Artrópodos de la Universidad del Quindio (MAUQ) cumple una doble función al ser de carácter científico y de docencia. En él se encuentran preservados 3594 ejemplares reportados en el Instituto de Investigaciones en Recursos Biológicos Alexander von Humboldt. Esta colección es esencial para el estudio de la diversidad de artrópodos del Quindío y de referencia importante para todos aquellos investigadores nacionales e internacionales, interesados en estos grupos, pues los ejemplares contenidos en ella son la representación material de gran parte de artrópodos del territorio quindiano y de otras zonas del país. El MAUQ también tienen como propósito favorecer la interacción pedagógica por medio de visitas guiadas y capacitaciones de la biología de la fauna artrópoda, el manejo de colecciones y métodos de colecta. El público objetivo es la comunidad en general interesada en conocer y sensibilizarse en la identificación de artrópodos de la nuestra región. <br /><br />
 
 
Servicios MAUQ: <br /><br />
 
>Elaboración de montajes permanentes de artrópodos colectados con autorización de la Institución <br />responsable (ministerio o corporación).<br />
>Determinación taxonómica de muestras entomológicas.<br />
>Estudios entomológicos para el control de insectos vectores de enfermedades.<br />
>Centro de documentación.<br />
>Talleres sobre métodos de colecta, transporte, preservación y montaje de insectos para exposición, estudios científicos, académicos y muestra de colecciones.<br />
>Asesoría profesional a docentes, estudiantes o particulares interesados en el área.<br />


	</div>
	<a href="<?php echo base_url(); ?>index.php/welcome/registro"> <div class="lgin">Iniciar sesion</div></a>

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