$(document).ready(function(){

var IP= $("#footer").attr("name");
var page=1;
$("#rep").css("text-align", "center");
$("#rep").css("font-size", "12pt");
$(".edit_btn").css("width", "100%");

$("#detalle").hide();
$("#sombra").hide();
//correccion de fechas
$("#corregir").click(function(){
    page=1;
$("#detalle").fadeIn();
$("#sombra").fadeIn();
});
cargaFecha();
function cargaFecha(){
 $.post( IP+"index.php/reportes/cargarFechas", {0: page }).done(function(data){
        $("#detalle").html(data); 
        $("#sig").bind("click", function(){
            page+=15;
            cargaFecha();
        });

        $(".close").bind("click", function(){
        $("#detalle").fadeOut();
        $("#sombra").fadeOut();
        count();
        page=1;
        });

        $("#save").bind("click", function(){
            var formData = new FormData($("#formulario")[0]);
            var ruta = IP+"index.php/reportes/actualizafecha";
                                    $.ajax({
                                        url: ruta,
                                        type: "POST",
                                        data: formData,
                                        contentType: false,
                                        processData: false,
                                    }).done(function(data){
                                        alert(data);
                                        cargaFecha();
                                    });
        });
            $("input[class=fechas]").bind("change", function(){
                var nm = $(this).attr("name");
                var dt = $(this).val();
        $.post( IP+"index.php/admin/validarFecha", { 1: dt } ).done(function(data){
            if(data!="ok"){
                alert("Ingrese una fecha válida DD/MM/AAAA");
                $("input[name="+nm+"]").val("");
            }
        }); 
        }); 


        });
}
count();
    function count(){
    $.post( IP+"index.php/reportes/cantidadFechas").done(function(data){
            $("#cf").html(data);
        }); 
    }

    especimenes();
    function especimenes(){
    $.post( IP+"index.php/reportes/cantidadEspecimenes").done(function(data){
           $("#inds").html(data);
        }); 
    }
    
});