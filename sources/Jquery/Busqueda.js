$(document).ready(function(){

var IP= $("#footer").attr("name");		


	var fltrs=[];   //arreglo que contiene los filtros de búsqueda
	var page=0;		//indice de la pagina de búsqueda
	    //Añadir filtro
	    $("#addFlt").click(function(){
	    	var NuevoFiltro; //Variable que contendrá el filtro del usuario
	    	var flag = true; //indicador de no existencia de filtro de la misma categoría
	    	//Comprobación de la no existencia de la categoría del filtro
	    	$.each(fltrs, function(index, value){
	    		if (value.indexOf($("#flt").val()) >= 0){
	    			//En caso de existencia, se cambia el valor de la bandera y el contenido del filtro
	    			flag = false;
	    			fltrs[index] =  $("#flt").val()+": "+$("#vl").val();
	    		}
	    	});
	    	//En caso de ser un nuevo filtro se añade al arreglo de filtros
	    	if(flag){
	    	NuevoFiltro = $("#flt").val()+": "+$("#vl").val();
	    	fltrs.push(NuevoFiltro);	    		    	
	    	}
	    	//Se borra el listado de filtros
	    	$(".listafiltro").html("");
	    	//Se reescriben los filtros 
	    	$.each(fltrs, function(index, value){
	    		$(".listafiltro").append('<div id="'+index+'" class="elemFiltro" tittle="Click para eliminar el filtro">'+value+'</div>');
	    	});
	    	//Acciones cuando el mouse pasa encima del filtro
	    	$(".elemFiltro").bind("mouseover", function(){
			$(this).css({"background-color" : "red", "color" : "white"});
			});
			//acciones cuando el mouse sale del filtro
			$(".elemFiltro").bind("mouseout", function(){
			$(this).css({"background-color" : "white", "color" : "black"});
			});
			//Acciones cuándo se da click en el filtro
			$(".elemFiltro").bind("click", function(){
			$(this).hide();
			var index = $(this).attr("id");
			fltrs.splice(index,1);
			});
	    });
	    //Mostrar/ocultar detalle de especimen
		$("#detalle").hide();
		$("#sombra").hide();
		$(".pup").hide();
		//$(".seccion").hide();
		$(".clickarea").click(function(){
			var press = $(this).attr("id");
			press = press[1];
			$("#i"+press).toggle("slow");
		});
		//función que solicita la búsqueda en el controlador
		function buscar()
		{
			$.post( IP+"index.php/Busqueda/buscar", { 1: fltrs, 2: page} ).done(function(data){
				//escribe la respuesta de la consulta
				$("#resultados").hide();
				$("#resultados").html(data);
				$("#resultados").fadeIn("slow")
				//calcula el numero de pagina
				$("#pag").html("página: "+((page/8)+1));
				//asigna funcionalidad al div registro
				$(".registro").bind("click", function(){
				//Obtiene el id del registro
				var id = $(this).attr("id");
				//muestra el div con el detalle del insecto
				$("#sombra").fadeIn("slow");
				//ejecuta la búsqueda
				$.post( IP+"index.php/Busqueda/detalle", {1: id}).done(function(data){
					//escribe los datos recuperados
					$("#detalle").html(data);
					$("input[name=file]").bind("change", function(){
					ventanaConfirmacion("Esta seguro de agregar esta foto al especimen?");
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
											var foto= data;
										$.post( IP+"index.php/Busqueda/agregarFoto", {1: $("#esp").val(), 2: foto}).done(function(data1){
											alert(data1);
											$(".VentanaConfirmacion").remove();
								$("#pup").fadeOut();
								$("#sombra").fadeOut("slow");
								$("#detalle").fadeOut("slow");
								buscar();

										});

										});

								}else{
									$(".VentanaConfirmacion").fadeOut("slow");
								$(".VentanaConfirmacion").remove();
								$("#pup").fadeOut();
								}
							});

					});
					//asigna funcionalida a la X de cerrar la ventana
					$(".close").bind("click", function(){
					$("#detalle").toggle("slow");
					$("#sombra").fadeOut("slow");
					});
					//implementa las acciones para el boton eliminar
					$("#delete").bind("click", function(){
						
	ventanaConfirmacion("Esta seguro de que desea eliminar el especimen?");
	$(".BtnAlert").bind("click", function(){
								var opcion = $(this).attr("id");
								//el usuario confirma el cambio
								if(opcion=="ok"){
									$.post( IP+"index.php/admin/eliminarEspecimen", { 0 : $("#delete").attr("especimen")} ).done(function(data){
									alert(data);
									$(".VentanaConfirmacion").remove();
									$("#detalle").toggle("slow");
									$("#sombra").fadeOut("slow");
									buscar();
									});
								}else{
									$(".VentanaConfirmacion").fadeOut("slow");
								$(".VentanaConfirmacion").remove();
								$("#pup").fadeOut();
								}
							});

					});
					
				});
				//muestra el div de detalle con la información
				$("#detalle").toggle("slow");
				});
			});
		}
		//Botón que procesa las búsquedas
		$("#bsq").click(function(){
			page = 0;
			buscar();
		});
		//Botón que procesa las búsquedas en la siguiente página
		$("#sgt").click(function(){
			page = page+8;
			buscar();
		});
		//Botón que procesa las búsquedas en la página anterior
		$("#ant").click(function(){
			if(page>=0){
				page = page-8;
			}
			buscar();
		});

		//Control de filtros en el módulo de búsqueda
		$("#flt").change(function(){
			var data = $("#flt").val();
			
			if(data == "TAXON"){
				$.post( IP+"index.php/Busqueda/comboBox", { 1: "CATTAXON", 2: "vl", 3: "CATEGORIA_ID", 4: "TAXON" } ).done(function(data){
				$("#fl").html(data);
				});
			}
			if(data == "CLAS"){
				$.post( IP+"index.php/Busqueda/comboBox", { 1: "CLASE", 2: "vl", 3: "CLASE_ID", 4: "CLAS" } ).done(function(data){
				$("#fl").html(data);
				});
			}
			if(data == "ORD"){
				$.post( IP+"index.php/Busqueda/comboBox", { 1: "ORDEN", 2: "vl", 3: "ORDEN_ID", 4: "ORD" } ).done(function(data){
				$("#fl").html(data);
			});
			}
			if(data == "FAM"){
				$.post( IP+"index.php/Busqueda/comboBox", { 1: "FAMILIA", 2: "vl", 3: "FAMILIA_ID", 4: "FAM" } ).done(function(data){
				$("#fl").html(data);
			});
			}
			if(data == "GEN"){
				$.post( IP+"index.php/Busqueda/comboBox", { 1: "GENERO", 2: "vl", 3: "GENERO_ID", 4: "GEN" } ).done(function(data){
				$("#fl").html(data);
			});
			}
			if(data == "PAIS"){
				$.post( IP+"index.php/Busqueda/comboBox", { 1: "PAIS", 2: "vl", 3: "PAIS_ID", 4: "PAIS" } ).done(function(data){
				$("#fl").html(data);
			});
			}
			if(data == "DEP"){
				$.post( IP+"index.php/Busqueda/comboBox", { 1: "DEPTO", 2: "vl", 3: "DEPTO_ID", 4: "DEP" } ).done(function(data){
				$("#fl").html(data);
			});
			}
			if(data == "MUN"){
				$.post( IP+"index.php/Busqueda/comboBox", { 1: "MUNICIPIO", 2: "vl", 3: "MUNICIPIO_ID", 4: "MUN" } ).done(function(data){
				$("#fl").html(data);
			});
			}
			if(data == "ESPECIMEN"){
				
			}
		});
		//Carga por defecto el valor para la categoria de filtro: categoria de taxon
		$.post( IP+"index.php/Busqueda/comboBox", { 1: "CATTAXON", 2: "vl", 3: "CATEGORIA_ID", 4: "TAXON" } ).done(function(data){
				$("#fl").html(data);
				});
		function ventanaConfirmacion(texto){	
	$("body").append('<div class="VentanaConfirmacion"> Confirmación <div class="cuerpo">'+texto+'<br /><br /><br /> <a href="#" class="BtnAlert" id="ok">Aceptar</a>	<a href="#" class="BtnAlert" id="cancel">Cancelar</a></div>');
		}

});