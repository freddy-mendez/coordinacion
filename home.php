<?php

    session_start();

    $id_user = $_SESSION["id_user"];

    if (!$id_user) {
        header("Location: index.php");
        return;
    }

    //$nombre = $_SESSION['nombre'];
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <button type="button" id="btn-nueva-salida" class="btn btn-dark">Nueva salida</button>
            </form>
            
        </div>


        <div class="row">
            <div class="col">
                <div id="resultado" class="resultado">
                
                </div>
            </div>
        </div>

</body>
</html>



