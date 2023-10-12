function mostrar_datos_aprendiz(aprendiz) {
    var res = $("#resultado");
    var tabla = $("<tabla></tabla>");
    var thead = $("<thead><tr><th>Documento</th><th>Nombres</th><th>Email</th><th>Numero de ficha</th><th>Programa de formacion</th><th>Lider de la ficha</th></tr></thead>");
    $(tabla).addClass("table");
    $(tabla).append($("<h2>Datos del aprendiz</h2>"));
    $(tabla).append(thead);
    $(tabla).attr("id","id_tabla_aprendiz");
    var tbody = $("<tbody></tbody");
    var fila = $("<tr></tr>");
    var celda = $("<td></td>");
    celda.html(  aprendiz.documento  );
    $(fila).append(celda);
    celda = $("<td></td>");
    celda.html(  aprendiz.nombres+" "+aprendiz.apellidos  );
    $(fila).append(celda);
    celda = $("<td></td>");
    celda.html(  aprendiz.email  );
    $(fila).append(celda);
    celda = $("<td></td>");
    celda.html(  aprendiz.numero  );
    $(fila).append(celda);
    celda = $("<td></td>");
    celda.html(  aprendiz.programa  );
    $(fila).append(celda);
    celda = $("<td></td>");
    celda.html(  aprendiz.lider  );
    $(fila).append(celda);
    $(fila).attr("id", "id_fila");
    $(tbody).append(fila);
    $(tabla).append(tbody);
    $(res).append(tabla);
}

function mostrar_datos_historial(historial) {
    var res = $("#resultado");
    var tabla = $("<tabla></tabla>");
    var thead = $("<thead><tr><th>Coordinador</th><th>Motivo</th><th>Fecha</th><th>Hora</th><th>Duracion</th></tr></thead>");        
    $(tabla).addClass("table");
    $(tabla).append($("<h2>Historial de salidas</h2>"));
    $(tabla).append(thead);
    $(tabla).attr("id","id_tabla_historial");
    var tbody = $("<tbody></tbody>");
    historial.forEach(element => {             
        var fila = $("<tr></tr>");
        var celda = $("<td></td>");
        celda.html(  element.coordinador  );
        $(fila).append(celda);
        celda = $("<td></td>");
        if (element.nombre_motivo=="Otros") {
            celda.html(  element.otros  );
        } else {
            celda.html(  element.nombre_motivo  );
        }      
        $(fila).append(celda);
        celda = $("<td></td>");
        celda.html(  element.fecha  );
        $(fila).append(celda);
        celda = $("<td></td>");
        celda.html(  element.hora  );
        $(fila).append(celda);
        celda = $("<td></td>");
        celda.html(  element.duracion + " horas" );
        $(fila).append(celda);
        $(fila).addClass("id_fila_historial");
        $(tbody).append(fila);      
    });
    $(tabla).append(tbody);
    $(res).append(tabla);
    
}



$(document).ready(function () {
    $("#btn-buscar").click(function () {
        var document = $("#documento").val();
        var res = $("#resultado");
        $(res).html("");
        //$("#id_tabla_aprendiz").remove();
        //$("#id_tabla_historial").remove();
        $.ajax({
            url:"/coordinacion/busqueda.php",
            type: "POST",
            dataType: "json",
            data: {
                "documento" : document
            },
            success : function (data) {
                if (data.estado=="OK") {
                    console.log(data);
                    mostrar_datos_aprendiz(data.resultado.aprendiz);
                    mostrar_datos_historial(data.resultado.historial);
                } else {
                    $("#resultado").text(data.msg);
                }
               
            },
            error: function (jqXHR, textStatus, exception) {
                console.log(exception);
            }
        });
    });

    $("#btn-nueva-salida").click(function (){
        var res = $("#resultado");
        $(res).html("");
    }); 
});