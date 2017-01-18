$(document).ready(function(){
 
 var IP= $("#footer").attr("name");
 $(".abrir").css("opacity", "0");
 $(".cajon").css("background-image", "url('"+IP+"/gavetas/cajon.jpg')");
$(".abrir").css("background-image", "url('"+IP+"/gavetas/gvt.png')");




 $(".cajon").click(function(){
 	//$("#abrir").hide();
 	var pos = $(this).attr("name");
	var fin = 72 + ((pos-1)*50);
 	var current = $(this).attr("g");
 	$("#"+current).animate({
			opacity: 0,
	}, "fast");

 	$("#"+current).animate({
			top: ""+fin+"px"
	}, "fast");

 	//$("#abrir").css("top", ""+fin+"px");

 	$("#"+current).animate({
			opacity: 1
		}, "fast");
 });
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
					 	});

					 $(".abrir").bind("click", function(){
					 	$(this).animate({
							opacity: 0
						}, "fast");
						 $(".abrir").css("z-index", "-1");
						 $(".abrir").css("opacity", "0");
					 });
					});


});