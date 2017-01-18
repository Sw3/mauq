$(document).ready(function(){

	//vairables de uso global
	var progreso=1; //indince de div para registro de especimen
	var fltrs=[];   //arreglo que contiene los filtros de búsqueda
	var page=0;		//indice de la pagina de búsqueda
	//Carga la ip del sitio
	var IP= $("#footer").attr("name");


	//Inicialización de elementos del módulo de registro
	$(".panel1").hide();		//oculta todos los divs de inserción de información
	$("#1").fadeIn('fast');		//Hace visible el primer div de inserción de información
	$("#fin").hide();			//Oculta el botón de envío de formulario
	$.post( IP+"index.php/admin/comboBox", { 1: "CATTAXON", 2: "vl", 3: "CATEGORIA_ID", 4: "TAXON" } ).done(function(data){
				$("#fl").html(data);
				}); //inicial el combobox de filtro: categoría de taxon
	//Validador de fecha
	$("input[name=fecha]").change(function(){
		$.post( IP+"index.php/admin/validarFecha", { 1: $("#fecha").val() } ).done(function(data){
			if(data!="ok"){
				$("#fval").html("La fecha ingresada no es válida");
				$("#sig").fadeOut('slow');
				alert("Ingrese una fecha válida DD/MM/AAAA");
			}else{
				$("#fval").html("");
				$("#sig").fadeIn('slow');
			}
		});	
		});	

	/* creación de combobox en el módulo de registro:
	el arreglo que se envía contiene la siguiente estructura
	1: tiene el nombre de la tabla a consultar
	2: tiene el id del elemento para el formulario html
	3: tiene el id de la tabla de la bd
	4: tiene el el valor para el elemento en la lista
	*/
	//función para cargar el comboBox de "acreditación de origen de especimen"

		$.post( IP+"index.php/admin/comboBox", { 1: "ACREDITACIONORIGEN", 2: "Acreditacion", 3: "ACREDITACION_ID", 4: "ACREDITACION" } ).done(function(data){
				$("#cb1").html(data);
			});
		//función para cargar el comboBox de "Preparaciones"
		$.post( IP+"index.php/admin/comboBox", { 1: "PREPARACIONES", 2: "Preparaciones", 3: "PREPARACIONES_ID", 4: "PREPARACION" } ).done(function(data){
				$("#cb2").html(data);
			});
		//función para cargar el comboBox de "Categoria del taxon"
		$.post( IP+"index.php/admin/comboBox", { 1: "CATTAXON", 2: "catt", 3: "CATEGORIA_ID", 4: "TAXON" } ).done(function(data){
				$("#cb3").html(data);
			});
				//función para cargar el comboBox de "Clase"
		$.post( IP+"index.php/admin/comboBox", { 1: "CLASE", 2: "clase", 3: "CLASE_ID", 4: "CLAS" } ).done(function(data){
				$("#cb4").html(data);
			});
				//función para cargar el comboBox de "orden"
		$.post( IP+"index.php/admin/comboBox", { 1: "ORDEN", 2: "ord", 3: "ORDEN_ID", 4: "ORD" } ).done(function(data){
				$("#cb5").html(data);
			});
				//función para cargar el comboBox de "familia"
		$.post( IP+"index.php/admin/comboBox", { 1: "FAMILIA", 2: "fam", 3: "FAMILIA_ID", 4: "FAM" } ).done(function(data){
				$("#cb6").html(data);
			});
				//función para cargar el comboBox de "genero"
		$.post( IP+"index.php/admin/comboBox", { 1: "GENERO", 2: "gen", 3: "GENERO_ID", 4: "GEN" } ).done(function(data){
				$("#cb7").html(data);
			});
		/*Fin de llenado de combobox*/

		
		//Control de filtros en el módulo de búsqueda
		$("#flt").change(function(){
			var data = $("#flt").val();
			
			if(data == "TAXON"){
				$.post( IP+"index.php/admin/comboBox", { 1: "CATTAXON", 2: "vl", 3: "CATEGORIA_ID", 4: "TAXON" } ).done(function(data){
				$("#fl").html(data);
				});
			}
			if(data == "CLAS"){
				$.post( IP+"index.php/admin/comboBox", { 1: "CLASE", 2: "vl", 3: "CLASE_ID", 4: "CLAS" } ).done(function(data){
				$("#fl").html(data);
				});
			}
			if(data == "ORD"){
				$.post( IP+"index.php/admin/comboBox", { 1: "ORDEN", 2: "vl", 3: "ORDEN_ID", 4: "ORD" } ).done(function(data){
				$("#fl").html(data);
			});
			}
			if(data == "FAM"){
				$.post( IP+"index.php/admin/comboBox", { 1: "FAMILIA", 2: "vl", 3: "FAMILIA_ID", 4: "FAM" } ).done(function(data){
				$("#fl").html(data);
			});
			}
			if(data == "GEN"){
				$.post( IP+"index.php/admin/comboBox", { 1: "GENERO", 2: "vl", 3: "GENERO_ID", 4: "GEN" } ).done(function(data){
				$("#fl").html(data);
			});
			}
			if(data == "PAIS"){
				$.post( IP+"index.php/admin/comboBox", { 1: "PAIS", 2: "vl", 3: "PAIS_ID", 4: "PAIS" } ).done(function(data){
				$("#fl").html(data);
			});
			}
			if(data == "DEP"){
				$.post( IP+"index.php/admin/comboBox", { 1: "DEPTO", 2: "vl", 3: "DEPTO_ID", 4: "DEP" } ).done(function(data){
				$("#fl").html(data);
			});
			}
			if(data == "MUN"){
				$.post( IP+"index.php/admin/comboBox", { 1: "MUNICIPIO", 2: "vl", 3: "MUNICIPIO_ID", 4: "MUN" } ).done(function(data){
				$("#fl").html(data);
			});
			}
			if(data == "ESPECIMEN"){
				
			}
		});
		

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
	/*
		Implementacion de funciones del menu de navegacion para administracion
	*/
		$(".menuItem").click(function(){
			window.location.href = '';
			window.location.href = 'index.php/welcome/educacion';
		});

		/*
			control de progreso de insersion de datos en los divs
		*/
		$("#sig").click(function(){
			
			if(progreso<2){
			$(".panel1").hide();
			progreso++;
			$('#'+progreso).fadeIn('slow');
			}else{
				$(".panel1").hide();
				progreso++;
				$("#sig").hide();	
				$("#fin").fadeIn("slow");	
				$('#'+progreso).fadeIn('slow');
			}
				
		});

		//boton regresar en el modulo de añdir especimen
		$("#reg").click(function(){
			$("#sig").fadeIn("slow");	
			$("#fin").hide();
			if(progreso>1){
				$(".panel1").hide();
			progreso--;
			$('#'+progreso).fadeIn('slow');
			}else{
				//$(".sig").text("TERMINAR REGISTROO");
			}
				
		});
		//Funcion que envía los datos del registro
		$("#fin").click(function(){
	
			$.post( IP+"index.php/admin/registrar",
			 {1:$("#Acreditacion").val(),
			 2:$("#idRegBio").val(),
			 3:$("#NumCat").val(),
			 4:$("#Preparaciones").val(),
			 5:$("#NomColector").val(),
			 6:$("#IdentificadoPor").val(),
			 7:$("#fecha").val(),
			 8:$("#pais").val(),
			 9:$("#depto").val(),
			 10:$("#mun").val(),
			 11:$("#loc").val(),
			 12:$("#lat").val(),
			 13:$("#lon").val(),
			 14:$("#elevmin").val(),
			 15:$("#elevmax").val(),
			 16:$("#catt").val(),
			 17:$("#num").val(),
			 18:$("#clase").val(),
			 19:$("#ord").val(),
			 20:$("#fam").val(),
			 21:$("#gen").val(),
			 22:$("#ep").val()
			} ).done(function(data){
				alert(data);
				location.reload();

			});
		});
		//función que solicita la búsqueda en el controlador
		function buscar()
		{
			$.post( IP+"index.php/admin/buscar", { 1: fltrs, 2: page} ).done(function(data){
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
				$.post( IP+"index.php/admin/detalle", {1: id}).done(function(data){
					//escribe los datos recuperados
					$("#detalle").html(data);
					//asigna funcionalida a la X de cerrar la ventana
					$(".close").bind("click", function(){
					$("#detalle").toggle("slow");
					$("#sombra").fadeOut("slow");
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

		//Listado de recursos educativos
		$.post( IP+"index.php/admin/ListarRecursos").done(function(data){
				$("#tablarecs").html(data);
				$(".edit_btn").bind("click", function(){
					
				});
				$(".myButton").bind("click", function()
				{	//funciones de elmininación
					var id = $(this).attr("id");
					ventanaConfirmacion();
								$(".BtnAlert").bind("click", function(){
								var opcion = $(this).attr("id");
								if(opcion=="ok"){
									$.post( IP+"index.php/admin/eliminaRecurso", {1: id}).done(function(data){
									window.location.href = IP+"/index.php/welcome/educacion";
									});
								}else{
									$(".VentanaConfirmacion").fadeOut("slow");
								$(".VentanaConfirmacion").remove();
								}
								
							});
					
				});
			});

		//Mostrar/ocultar 
		$("#detalle").hide();
		$("#sombra").hide();
		$(".pup").hide();
		//$(".seccion").hide();
		$(".clickarea").click(function(){
			var press = $(this).attr("id");
			press = press[1];
			$("#i"+press).toggle("slow");
		});

		function ventanaConfirmacion(){	
	$("body").append('<div class="VentanaConfirmacion"> Confirmación <div class="cuerpo">Está seguro de esta acción?	<br /><br /><br /> <a href="#" class="BtnAlert" id="ok">Aceptar</a>	<a href="#" class="BtnAlert" id="cancel">Cancelar</a></div>');
		}

});