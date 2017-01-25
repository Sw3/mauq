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
			$.post( IP+"index.php/Welcome/TablaProtocolos", { 0 : '0' } ).done(function(data1){
			$("#protocoloscontent").append(data1);	
								
		});					
		});
	  //carga contenido de la pagina de recursos
	  $(".cont").css("text-align", "center");//centra el texto de la tabla 
	  $("#prototabla").css("font-size", "12pt"); //organiza el tamaño de letra
	  $.post( IP+"index.php/Welcome/cargarContenido", { 0 : "RECURSOS" } ).done(function(data){
		$("#recursoscontent").html(data);	
			$.post( IP+"index.php/Welcome/TablaProtocolos", { 0 : '1' } ).done(function(data1){
			$("#recursoscontent").append(data1);	
								
		});							
		});
	  //funcion para inicio de sesion
	  $(".acceso").click(function(){
	  	$.post( IP+"index.php/Welcome/login", { 0 : $("#usr").val(), 1 : $("#pass").val() } ).done(function(data){
		if(data=="ok"){
		window.location.href = IP+"index.php/Welcome/registro";
		}	
		else{
			alert("Los datos ingresados son incorrectos");
		}						
		});
	  });
	  $(".logBox").hide();
	  $(".lgin").click(function(){
	  	$(".logBox").toggle("slow");
	  });
	  $("#closeSession").click(function(){
	  	if(confirm("Está seguro de cerrar sesion?")){
			$.post( IP+"index.php/Welcome/logOut");
	  		window.location.href = IP+"index.php/Welcome/registro";
	  	}
	  	
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