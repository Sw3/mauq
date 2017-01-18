$(document).ready(function(){

var IP= $("#footer").attr("name");
//Acciones para el submenu
	$(".sec").hide();
	$("#inicial").fadeIn("fast");
//visibiliza pagina inicial
$("#p1").click(function(){
	$(".sec").hide();
	$("#inicial").fadeIn("fast");
});

//visibiliza pagina inicial
$("#p2").click(function(){
	$(".sec").hide();
	$("#gavs").fadeIn("fast");
});

//visibiliza pagina inicial
$("#p3").click(function(){
	$(".sec").hide();
	$("#deps").fadeIn("fast");
});

//visibiliza pagina inicial
$("#p4").click(function(){
	$(".sec").hide();
	$("#museo").fadeIn("fast");
});
//carga las gavetas
		getGavetas();
		function getGavetas(){
			$.post( IP+"index.php/admin/getGavetas").done(function(data){
			$("#gavs").html(data);
			//creacion de gavetas
			$("#nvgvt").bind("click", function(){
				$.post( IP+"index.php/admin/crearGaveta").done(function(data){
					getGavetas();
				});
			});
			//botones de las tablas
			$(".Btns").bind("click", function(){
				//eliminacion de gavetas
				var func = $(this).attr("fn");

				if(func == "nvcajon"){
					var gaveta = $(this).attr("gv");
					gaveta = gaveta*100;
					$.post( IP+"index.php/admin/agregarCajon", {1: gaveta}).done(function(data){
						getGavetas();
						});
				}
				if(func == "dlt"){
					var gaveta = $(this).attr("gv");
					gaveta = gaveta*100;
					alert("alerta eliminacion");
					$.post( IP+"index.php/admin/EliminarGaveta", {1: gaveta}).done(function(data){
						getGavetas();
						});
				}
				//Función para eliminar cajon
				if(func == "elcaj"){
					var cajon = $(this).attr("cj");
					alert("alerta eliminacion");
					$.post( IP+"index.php/admin/eliminarCajon", {1: cajon}).done(function(data){
						getGavetas();
						});
				}
				//Función para editar un cajon
				if(func == "edt"){
							var identifier = $(this).attr("cj"); //obtiene el id del cajon a editar
							$("#cjnid").val(identifier);
							$("#sombra").fadeIn("slow");
							$(".pup").fadeIn("slow");
							$("#cancel").bind("click", function(){
								$("#sombra").fadeOut("slow");
								$(".pup").fadeOut("slow");
							});
						}
				
			});
		});
		}
});