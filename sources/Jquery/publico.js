$(document).ready(function(){


	$("#guardar").click(function(){
		var formData = new FormData($("#formulario")[0]);

		$.post( IP+"index.php/Publico/actualizaInfoCajon", {0 : $("input[name=nombre]").val(), 1: $("input[name=desc]").val(), 2 : $("#cjnid").val() }).done(function(data){
		$(".pup").fadeOut();
		$("#sombra").fadeOut();
		getGavetas();
		});
		
	});


$(".pup").hide();
$("#sombra").hide();
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
			$.post( IP+"index.php/Publico/getGavetas").done(function(data){
			$("#gavs").html(data);
			//creacion de gavetas
			$("#nvgvt").bind("click", function(){
				$.post( IP+"index.php/Publico/crearGaveta").done(function(data){
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
					$.post( IP+"index.php/Publico/agregarCajon", {1: gaveta}).done(function(data){
						getGavetas();
						});
				}
				if(func == "dlt"){
					var gaveta = $(this).attr("gv");
					gaveta = gaveta*100;
					alert("alerta eliminacion");
					$.post( IP+"index.php/Publico/EliminarGaveta", {1: gaveta}).done(function(data){
						getGavetas();
						});
				}
				//Función para eliminar cajon
				if(func == "elcaj"){
					var cajon = $(this).attr("cj");
					alert("alerta eliminacion");
					$.post( IP+"index.php/Publico/eliminarCajon", {1: cajon}).done(function(data){
						getGavetas();
						});
				}
				//Función para editar un cajon
				if(func == "edt"){
							var identifier = $(this).attr("cj"); //obtiene el id del cajon a editar
							$("#cjnid").val(identifier);
							$(".currentimg").attr("src", IP+$(this).attr("img"));
							$("#sombra").fadeIn("slow");
							$(".pup").fadeIn("slow");
 							$("input[name=nombre]").val($(this).attr("nm"));
 							$("input[name=desc]").val($(this).attr("ds")),
							$("#cancel").bind("click", function(){
								$("#sombra").fadeOut("slow");
								$(".pup").fadeOut("slow");
							});
						}
				
			});
		});
		}
		//cambio de foto
	$("input[name=file]").change(function(){
	ventanaConfirmacion("Esta seguro de cambiar la foto del cajón?");
	$(".BtnAlert").bind("click", function(){
								var opcion = $(this).attr("id");
								//el usuario confirma el cambio
								if(opcion=="ok"){
									//carga la foto
								var formData = new FormData($("#formulario")[0]);
								var ruta = IP+"index.php/admin/upload";
									$.ajax({
										url: ruta,
										type: "POST",
										data: formData,
										contentType: false,
										processData: false,
									}).done(function(data){
										var ruta = data;
										var idcajon = $("#cjnid").val();

										$.post( IP+"index.php/Publico/actualizafotoCajon", {0 : ruta, 1 : idcajon}).done(function(data){
										alert("La foto ha sido actualizada");
										});
										$(".VentanaConfirmacion").remove();
									});
									//el usuario cancel el cambio
								}else{
									$(".VentanaConfirmacion").fadeOut("slow");
								$(".VentanaConfirmacion").remove();
								$("#pup").fadeOut();
								}
								
							});
	});



function ventanaConfirmacion(texto){	
	$("body").append('<div class="VentanaConfirmacion"> Confirmación <div class="cuerpo">'+texto+'<br /><br /><br /> <a href="#" class="BtnAlert" id="ok">Aceptar</a>	<a href="#" class="BtnAlert" id="cancel">Cancelar</a></div>');
		}
});