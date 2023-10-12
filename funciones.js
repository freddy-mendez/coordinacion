function mostrar_datos_aprendiz(aprendiz) {

}

function mostrar_datos_historial(historial) {
    
}

$(document).ready(function() {
    $("#btnBuscar").click(function(){
        var documento = $("#documento").val();
        $.ajax({
            url: "http://localhost/coordinacion/busqueda.php",
            type: "POST",
            dataType: "json",
            data: {
                "documento":documento
            },
            success: function(data) {
                if (data.estado=="OK") {
                    mostrar_datos_aprendiz(data.resultado.aprendiz);
                    mostrar_datos_historial(data.resultado.historial);
                } else {
                    $("#resultado").text(data.msg);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    });
});