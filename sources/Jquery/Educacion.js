$(document).ready(function(){

var IP= $("#footer").attr("name");
//Acciones para el submenu
$(".editRecurso").hide();

$("#cancel").click(function(){
$(".editRecurso").fadeOut();
});
//Listado de recursos educativos
		$.post( IP+"index.php/Educacion/ListarRecursos").done(function(data){
				$("#tablarecs").html(data);
				$("#eBtn").bind("click", function(){
					$(".editRecurso").fadeIn("fast");
				});
				$(".myButton").bind("click", function()
				{	//funciones de elmininación
					var id = $(this).attr("id");
					ventanaConfirmacion();
								$(".BtnAlert").bind("click", function(){
								var opcion = $(this).attr("id");
								if(opcion=="ok"){
									$.post( IP+"index.php/Educacion/eliminaRecurso", {1: id}).done(function(data){
									window.location.href = IP+"/index.php/welcome/educacion";
									});
								}else{
									$(".VentanaConfirmacion").fadeOut("slow");
								$(".VentanaConfirmacion").remove();
								}
								
							});
					
				});
			});

	//Función que muestra en pantalla una ventana de confirmación de una accion
	function ventanaConfirmacion(){	
	$("body").append('<div class="VentanaConfirmacion"> Confirmación <div class="cuerpo">Está seguro de esta acción?	<br /><br /><br /> <a href="#" class="BtnAlert" id="ok">Aceptar</a>	<a href="#" class="BtnAlert" id="cancel">Cancelar</a></div>');
		}
});