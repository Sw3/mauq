$(document).ready(function(){


	//cambio de color de los elementos del menu al pasar mouse sobre
	  $(".menuItem").on("mouseover",function(){
	        $(this).css("background-color", "#00A99D");
	    });
	  //cambio de color de los elementos del menu estado normal
	  $(".menuItem").on("mouseleave",function(){
	        $(this).css("background-color", "#AAE2E0");
	    });

});