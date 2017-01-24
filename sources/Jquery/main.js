$(document).ready(function(){

	var IP= $("#footer").attr("name");
	//cambio de color de los elementos del menu al pasar mouse sobre
	  $(".menuItem").on("mouseover",function(){
	        $(this).css("background-color", "#00A99D");
	    });
	  //cambio de color de los elementos del menu estado normal
	  $(".menuItem").on("mouseleave",function(){
	        $(this).css("background-color", "#AAE2E0");
	    });

	  //cambio de color de los elementos del menu al pasar mouse sobre
	  $(".menuItem1").on("mouseover",function(){
	        $(this).css("background-color", "#00A99D");
	    });
	  //cambio de color de los elementos del menu estado normal
	  $(".menuItem1").on("mouseleave",function(){
	        $(this).css("background-color", "#AAE2E0");
	    });

	  //carga contenido de la pagina de inicio
	  $.post( IP+"index.php/Welcome/cargarContenido", { 0 : "INICIO" } ).done(function(data){
		$("#iniciocontent").html(data);							
		});
	  //carga contenido de la pagina de museo
	  $.post( IP+"index.php/Welcome/cargarContenido", { 0 : "MUSEO" } ).done(function(data){
		$("#museocontent").html(data);							
		});
	  //carga contenido de la pagina de protocolos
	  $.post( IP+"index.php/Welcome/cargarContenido", { 0 : "PROTOCOLOS" } ).done(function(data){
		$("#protocoloscontent").html(data);							
		});
	  //carga contenido de la pagina de recursos
	  $.post( IP+"index.php/Welcome/cargarContenido", { 0 : "RECURSOS" } ).done(function(data){
		$("#recursoscontent").html(data);							
		});


$(".env").click(function(){
			var formData = new FormData($("#formulario")[0]);
			var ruta = IP+"index.php/admin/upload";
				$.ajax({
					url: ruta,
					type: "POST",
					data: formData,
					contentType: false,
					processData: false,
				}).done(function(data){
					alert(data);
				});
			

});



});