$(document).ready(function(){

		var IP= $("#footer").attr("name");
	$("#guardar").click(function(){
		var formData = new FormData($("#formulario")[0]);

		$.post( IP+"index.php/Publico/actualizaInfoCajon", {0 : $("input[name=nombre]").val(), 1: $("input[name=desc]").val(), 2 : $("#cjnid").val() }).done(function(data){
		$(".pup").fadeOut();
		$("#sombra").fadeOut();
		getGavetas();
		});
		
	});

$(".editRecurso").hide();
$("#cls").click(function(){
				$(".editRecurso").fadeOut("fast");
			});
//lista documentos de protocolos
listaProtocolos();
function listaProtocolos(){
	$.post( IP+"index.php/Educacion/ListarRecursos", {0:'0'}).done(function(data){
				$("#tablaProts").html(data);
				$(".edit_btn").bind("click", function(){
					if( $(this).attr("id").val()!="confirma" || $(this).attr("id").val()!="confirma1"  ){
						var act =$(this).attr("fn");
											if(act="edt"){
												$("#ref").val($(this).attr("id"));
												//carga los valores anteriores
												$("#nnombre").val($(this).attr("nm"));
												$("#ndesc").val($(this).attr("dc"));
												$(".editRecurso").fadeIn("fast");
												$("#cancel").bind("click", function(){
												$(".editRecurso").fadeOut("fast");
												});

					}
					
					}
					
				});
				$(".myButton").bind("click", function()
				{	//funciones de elmininación
					var id = $(this).attr("id");
					ventanaConfirmacion("Está seguro de eliminar este registro?");
								$(".BtnAlert").bind("click", function(){
								var opcion = $(this).attr("id");
								if(opcion=="ok"){
									$.post( IP+"index.php/Educacion/eliminaRecurso", {1: id}).done(function(data){
									listaProtocolos();
									$(".VentanaConfirmacion").remove();
									});
								}else{
									$(".VentanaConfirmacion").fadeOut("slow");
								$(".VentanaConfirmacion").remove();
								}
								
							});
					
				});
			});
}

//confirma edicion de recurso
$("#confirma").click(function(){
$.post( IP+"index.php/Educacion/EditarRecurso", {0: $("#ref").val(), 1 :$("#nnombre").val() , 2: $("#ndesc").val() }).done(function(data){
alert(data);
$(".editRecurso").fadeOut("fast");
listaRecs();
listaProtocolos();
});
});
//registra protocolo
$("#registrarProtocolo").click(function(){
			var formData = new FormData($("#proto")[0]);
			var ruta = IP+"index.php/admin/upload";
				$.ajax({
					url: ruta,
					type: "POST",
					data: formData,
					contentType: false,
					processData: false,
				}).done(function(data){
					foto = data;
					$.post( IP+"index.php/Educacion/nuevoRecurso", { 0: $("#NomProt").val(), 1: $("#descProt").val(), 2: foto, 3 : '0' } ).done(function(data1){
				listaProtocolos();
				alert(data1);
				$("#NomProt").val("");
				$("#descProt").val("");
				});
				});
		});

//Registrar recurso educativo
$("#registrar").click(function(){
			var formData = new FormData($("#recursos")[0]);
			var ruta = IP+"index.php/admin/upload";
				$.ajax({
					url: ruta,
					type: "POST",
					data: formData,
					contentType: false,
					processData: false,
				}).done(function(data){
					foto = data;
					$.post( IP+"index.php/Educacion/nuevoRecurso", { 0: $("#NomRec").val(), 1: $("#decrec").val(), 2: foto, 3 : '1' } ).done(function(data1){
				alert(data1);
				$("#NomRec").val("");
				$("#decrec").val("")
				listaRecs();
				});
				});
		});
//Listar recursos educativos
listaRecs();
function listaRecs(){
	$.post( IP+"index.php/Educacion/ListarRecursos", {0:'1'}).done(function(data){
				$("#tablarecs").html(data);
				$(".edit_btn").bind("click", function(){
					if( $(this).attr("id").val()!="confirma" || $(this).attr("id").val()!="confirma1"){
						var act =$(this).attr("fn");
											if(act="edt"){
												$("#ref").val($(this).attr("id"));
												//carga los valores anteriores
												$("#nnombre").val($(this).attr("nm"));
												$("#ndesc").val($(this).attr("dc"));
												$(".editRecurso").fadeIn("fast");
												$("#cancel").bind("click", function(){
												$(".editRecurso").fadeOut("fast");
												});
					}
					
					}
					
				});
				$(".myButton").bind("click", function()
				{	//funciones de elmininación
					var id = $(this).attr("id");
					ventanaConfirmacion("Está seguro de eliminar este registro?");
								$(".BtnAlert").bind("click", function(){
								var opcion = $(this).attr("id");
								if(opcion=="ok"){
									$.post( IP+"index.php/Educacion/eliminaRecurso", {1: id}).done(function(data){
									listaProtocolos();
									$(".VentanaConfirmacion").remove();
									});
								}else{
									$(".VentanaConfirmacion").fadeOut("slow");
								$(".VentanaConfirmacion").remove();
								}
								
							});
					
				});
			});



}
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
$("#p5").click(function(){
	$(".sec").hide();
	$("#educa").fadeIn("fast");
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

   //Carga de textos públicos
   	  //carga contenido de la pagina de inicio
	  $.post( IP+"index.php/Welcome/cargarContenido", { 0 : "INICIO" } ).done(function(data){
		$("#iniciocontent").val(data);							
		});
	  //carga contenido de la pagina de museo
	  $.post( IP+"index.php/Welcome/cargarContenido", { 0 : "MUSEO" } ).done(function(data){
		$("#museocontent").val(data);							
		});
	  //carga contenido de la pagina de protocolos
	  $.post( IP+"index.php/Welcome/cargarContenido", { 0 : "PROTOCOLOS" } ).done(function(data){
		$("#protocoloscontent").val(data);							
		});
	   //carga contenido de la pagina de recursos educativos
	  $.post( IP+"index.php/Welcome/cargarContenido", { 0 : "RECURSOS" } ).done(function(data){
		$("#educatext").val(data);							
		});
	  //fin de carga
	  	//accion de botones de guardar cambios
		$("#updeducativos").click(function(){
			//actualiza contenido de la pagina de inicio
			  $.post( IP+"index.php/Welcome/actualizarContenido", { 0: $("#educatext").val(), 1 : "RECURSOS" } ).done(function(data){
				alert(data);							
				});
		});
		$("#updinicio").click(function(){
			//actualiza contenido de la pagina de inicio
			  $.post( IP+"index.php/Welcome/actualizarContenido", { 0: $("#iniciocontent").val(), 1 : "INICIO" } ).done(function(data){
				alert(data);							
				});
		});
		$("#updmuseo").click(function(){
			//actualiza contenido de la pagina de inicio
			  $.post( IP+"index.php/Welcome/actualizarContenido", { 0: $("#museocontent").val(), 1 : "MUSEO" } ).done(function(data){
				alert(data);							
				});
		function ventanaConfirmacion(texto){	
			$("body").append('<div class="VentanaConfirmacion"> Confirmación <div class="cuerpo">'+texto+'<br /><br /><br /> <a href="#" class="BtnAlert" id="ok">Aceptar</a>	<a href="#" class="BtnAlert" id="cancel">Cancelar</a></div>');
				}
		});


		$("#PROTOC").click(function(){
			//actualiza contenido de la pagina de inicio
			  $.post( IP+"index.php/Welcome/actualizarContenido", { 0: $("#protocoloscontent").val(), 1 : "PROTOCOLOS" } ).done(function(data){
				alert(data);							
				});
		});
	});