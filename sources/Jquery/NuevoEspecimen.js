$(document).ready(function(){

	//vairables de uso global
	var progreso=1; //indince de div para registro de especimen
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
	function combox(){
		$.post( IP+"index.php/admin/comboBox", { 1: "ACREDITACIONORIGEN", 2: "Acreditacion", 3: "ACREDITACION_ID", 4: "ACREDITACION" } ).done(function(data){
				$("#cb1").html(data+'<div class="edit_btn" id="c1">Otro</a>');
				$("#c1").bind("click", function(){
					addComboBox("Acreditacion", prompt("Ingrese el valor nuevo"));
				});
			});
		//función para cargar el comboBox de "Preparaciones"
		$.post( IP+"index.php/admin/comboBox", { 1: "PREPARACIONES", 2: "Preparaciones", 3: "PREPARACIONES_ID", 4: "PREPARACION" } ).done(function(data){
				$("#cb2").html(data+'<a class="edit_btn" id="c2">Otro</a>');
				$("#c2").bind("click", function(){
					addComboBox("Preparaciones", prompt("Ingrese el valor nuevo"));
				});
			});
		//función para cargar el comboBox de "Categoria del taxon"
		$.post( IP+"index.php/admin/comboBox", { 1: "CATTAXON", 2: "catt", 3: "CATEGORIA_ID", 4: "TAXON" } ).done(function(data){
				$("#cb3").html(data+'<a class="edit_btn" id="c3">Otro</a>');
				$("#c3").bind("click", function(){
					addComboBox("catt", prompt("Ingrese el valor nuevo"));
				});
			});
				//función para cargar el comboBox de "Clase"
		$.post( IP+"index.php/admin/comboBox", { 1: "CLASE", 2: "clase", 3: "CLASE_ID", 4: "CLAS" } ).done(function(data){
				$("#cb4").html(data+'<a class="edit_btn" id="c4">Otro</a>');
				$("#c4").bind("click", function(){
					addComboBox("clase", prompt("Ingrese el valor nuevo"));
				});
			});
				//función para cargar el comboBox de "orden"
		$.post( IP+"index.php/admin/comboBox", { 1: "ORDEN", 2: "ord", 3: "ORDEN_ID", 4: "ORD" } ).done(function(data){
				$("#cb5").html(data+'<a class="edit_btn" id="c5">Otro</a>');
				$("#c5").bind("click", function(){
					addComboBox("ord", prompt("Ingrese el valor nuevo"));
				});
			});
				//función para cargar el comboBox de "familia"
		$.post( IP+"index.php/admin/comboBox", { 1: "FAMILIA", 2: "fam", 3: "FAMILIA_ID", 4: "FAM" } ).done(function(data){
				$("#cb6").html(data+'<a class="edit_btn" id="c6">Otro</a>');
				$("#c6").bind("click", function(){
					addComboBox("fam", prompt("Ingrese el valor nuevo"));
				});
			});
				//función para cargar el comboBox de "genero"
		$.post( IP+"index.php/admin/comboBox", { 1: "GENERO", 2: "gen", 3: "GENERO_ID", 4: "GEN" } ).done(function(data){
				$("#cb7").html(data+'<a class="edit_btn" id="c7">Otro</a>');
				$("#c7").bind("click", function(){
					addComboBox("gen", prompt("Ingrese el valor nuevo"));
				});
			});
		$.post( IP+"index.php/admin/comboBox", { 1: "PAIS", 2: "pais", 3: "PAIS_ID", 4: "PAIS" } ).done(function(data){
				$("#cb8").html(data+'<a class="edit_btn" id="c8">Otro</a>');
				$("#c8").bind("click", function(){
					addComboBox("pais", prompt("Ingrese el valor nuevo"));
				});
			});
		$.post( IP+"index.php/admin/comboBox", { 1: "DEPTO", 2: "depto", 3: "DEPTO_ID", 4: "DEP" } ).done(function(data){
				$("#cb9").html(data+'<a class="edit_btn" id="c9">Otro</a>');
				$("#c9").bind("click", function(){
					addComboBox("depto", prompt("Ingrese el valor nuevo"));
				});
			});
		$.post( IP+"index.php/admin/comboBox", { 1: "MUNICIPIO", 2: "mun", 3: "MUNICIPIO_ID", 4: "MUN" } ).done(function(data){
				$("#cb10").html(data+'<a class="edit_btn" id="c10">Otro</a>');
				$("#c10").bind("click", function(){
					addComboBox("mun", prompt("Ingrese el valor nuevo"));
				});
			});
		$.post( IP+"index.php/admin/comboBox", { 1: "LOCALIDAD", 2: "loc", 3: "LOCALIDAD_ID", 4: "LOC" } ).done(function(data){
				$("#cb11").html(data+'<a class="edit_btn" id="c11">Otro</a>');
				$("#c11").bind("click", function(){
					addComboBox("loc", prompt("Ingrese el valor nuevo"));
				});
			});
	}
		
		combox();

		function addComboBox(comb, valor){
			$("#"+comb).append(new Option(valor.toUpperCase(), valor.toUpperCase()));
			 $("#"+comb+"> option[value="+valor.toUpperCase()+"]").attr('selected', 'selected');
			//alert("La opción ha sido añadida");
		}
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

			}
				
		});
		//Funcion que envía los datos del registro
		$("#fin").click(function(){
			var foto ="";
		if($("input[name=file]").val()!=""){
			var formData = new FormData($("#formulario")[0]);
			var ruta = IP+"index.php/admin/upload";
				$.ajax({
					url: ruta,
					type: "POST",
					data: formData,
					contentType: false,
					processData: false,
				}).done(function(data){
					foto = data;
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
			 22:$("#ep").val(),
			 23:foto
			} ).done(function(data){
				alert(data);
				location.reload();

			});
				});
		}else{
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
			 22:$("#ep").val(),
			 23:foto
			} ).done(function(data){
				alert(data);
				location.reload();

			});
		}
	
			
		});
});