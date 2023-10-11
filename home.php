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
    <h1>Bienvenido <?php echo $nombre ?></h1>
    <br>
    <form method="post" action="index.php">
        <input type="number" name="documento" />
        <button type="submit">Buscar</button>
    </form>
</body>
</html>