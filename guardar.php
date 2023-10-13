<?php

if (isset($_POST['documento']) && isset($_POST['motivo']) &&
    isset($_POST['nHoras']) && isset($_POST['user_id'])) {

        include("conexion.php");

        $sql = "SELECT id FROM aprendices WHERE documento=".$_POST['documento'];
        $aprendiz_id="";
        
        if ($resultado=$conn->query($sql)) {
            if ($registro=$resultado->fetch_assoc()) {
                $aprendiz_id=$registro["id"];
            } else {
                $mensaje["msg"]="Documento no valido";
                $mensaje["estado"]="Error";
                echo json_encode($mensaje);
                return;
            }
        }

        $sql = "INSERT INTO salidas VALUES " .
        " (NULL, ".$aprendiz_id.", ".$_POST['user_id'].", " .
        $_POST['motivo'].", NULL, current_date, current_time,".$_POST['nHoras'].")";

        if ($conn->query($sql) === TRUE) {
            $mensaje["msg"]="Se Almaceno Correcto";
            $mensaje["estado"]="OK";
            echo json_encode($mensaje);
        } else {
            $mensaje["msg"]="NO Se Almaceno la información";
            $mensaje["estado"]="Error";
            echo json_encode($mensaje);
        }

} else {
    $mensaje = array();
    $mensaje["msg"]="Datos Incompletos";
    $mensaje["estado"]="Error";
    echo json_encode($mensaje);
}