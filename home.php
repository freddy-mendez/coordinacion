<?php

session_start();

$id_user = $_SESSION["id_user"];

if (!$id_user) {
    header("Location: index.php");
    return;
}

include("conexion.php");

$motivos = array();

$sql = "SELECT * FROM motivos";

if ($resultado = $conn->query($sql)) {
    while($registro = $resultado->fetch_assoc()) {
        $motivos[] = $registro;
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento</title>
    <?php include ('scripts.php'); ?>
</head>
<body>
    <div class="container p-5">
        <div class="row">
            <div class="col">
                <a class="btn btn-danger float-end mt-2" href="logout.php">Logout</a>
            </div>
        </div>
        <div class="row">
            <form action="index.php" method="post">
                <input type="number" name="documento" id="documento">
                <button type="button" id="btn-buscar" class="btn btn-success border">Buscar</button>
                <button type="button" id="btn-nueva-salida" class="btn btn-dark" 
                data-bs-toggle="modal" data-bs-target="#staticBackdrop">Nueva salida</button>
            </form>
        </div>


        <div class="row">
            <div class="col">
                <div id="resultado" class="resultado">
                
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <select name="motivo" id="motivo" class="form-control">
                <?php
                if (count($motivos) > 0) {
                    foreach ($motivos as $motivo) {
                        echo "<option value='".$motivo["id"]."'>".$motivo["nombre"]."</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button id="btnGuardar" type="button" class="btn btn-success">Guardar</button>
        </div>
        </div>
    </div>
    </div>

</body>
</html>



