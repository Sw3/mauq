$(document).ready(function(){
 
 var IP= $("#footer").attr("name");
 $(".abrir").css("opacity", "0");
 $(".cajon").css("background-image", "url('"+IP+"/gavetas/cajon.jpg')");
$(".abrir").css("background-image", "url('"+IP+"/gavetas/gvt.png')");



//accinoes al dar clic sobre un cajon
 $(".cajon").click(function(){
 	//obtiene el numero del cajon para abrirlo
 	var pos = $(this).attr("name");
	var fin = 72 + ((pos-1)*50);
 	var current = $(this).attr("g");
 	//animación de abrir cajon
 	$("#"+current).animate({
			opacity: 0,
	}, "fast");

 	$("#"+current).animate({
			top: ""+fin+"px"
	}, "fast");

 	$("#"+current).animate({
			opacity: 1
		}, "fast");
 });
 //animación de serrar cajon
	$(".abrir").click(function(){
		$(this).animate({
			opacity: 0
		}, "fast");
	});

	$("#der").click(function(){
		$("#expl").animate({
			left: "+=280px",
		}, "fast");
	});

	$("#izq").click(function(){
		$("#expl").animate({
			left: "-=280px",
		}, "fast");
	});

		//Carga de gavetas
		$.post( IP+"index.php/admin/GavetasUser").done(function(data){
					$("#educacioncontent").append(data);
					$(".abrir").css("opacity", "0");
					$(".abrir").css("z-index", "-1");
					 $(".cajon").css("background-image", "url('"+IP+"/gavetas/cajon.jpg')");
					 $(".abrir").css("background-image", "url('"+IP+"/gavetas/gvt.png')");
					 //acciones al dar clic sobre un cajon
					 $(".cajon").bind("click", function(){
					 	 $(".abrir").css("z-index", "1");
					 	var pos = $(this).attr("name");
						var fin = 72 + ((pos-1)*50);
					 	var current = $(this).attr("g");
					 	$("#"+current).animate({
								opacity: 0
						}, "fast");

					 	$("#"+current).animate({
								top: ""+fin+"px"
						}, "fast");

					 	$("#"+current).animate({
								opacity: 1
							}, "fast");

					 	//carga la foto
					 	var foto = $(this).attr("img");
					 		$("#imgGaveta").attr("src", IP+foto);
					 		$("#imgGaveta").css("z-index", "2");	
					 		$(".sombra").css("z-index", "1");
					 		$("#imgGaveta").delay(900);
					 		$(".sombra").delay(900);
						 	//muestra imagen
						 	$(".sombra").toggle("fast");
						 	$("#imgGaveta").toggle("slow");
					 	});

					 $(".abrir").bind("click", function(){
					 	$(this).animate({
							opacity: 0
						}, "fast");
						 $(".abrir").css("z-index", "-1");
						 $(".abrir").css("opacity", "0");
					 });
					});
		
		$(".sombra").hide();
		$("#imgGaveta").hide();
		//animacion guarda el cajon
		$(".sombra").click(function(){
			$(".sombra").toggle("fast");
			$("#imgGaveta").toggle("slow");
		});
		$("#imgGaveta").click(function(){
			$(".sombra").toggle("fast");
			$("#imgGaveta").toggle("slow");
		});
});