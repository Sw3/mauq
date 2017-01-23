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