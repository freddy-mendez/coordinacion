<?php
session_start();

$id_user = $_SESSION['id_user'];

if (!$id_user) {
    header('Location: index.php');
    return;
}

$nombre = $_SESSION['nombre'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    include('scripts.php');
    ?>
</head>
<body>
    <div class="container">
    <div class="row">
            <div class="col">
            <a class="btn btn-danger float-end mt-2" href="logout.php">Logout</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
            <h1>Bienvenido <?php echo $nombre ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <form method="post" action="index.php">
            <div class="input-group mb-3">
                <input id="documento" type="number" class="form-control" placeholder="Ingrese Documento" >
                <button class="btn btn-outline-secondary" type="button" id="btnBuscar" >Buscar</button>
            </div>
            </form>
        </div>
        <div class="row">
            <div class="col">
                <div id="resultado" class="resultado">

                </div>
            </div>
        </div>
    </div>
    </div>
    
</body>
</html>