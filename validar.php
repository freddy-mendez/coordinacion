<?php

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if ($username=="admin" && $password=="12345") {
        echo "Bienvenido";
    } else {
        echo "Error";
    }
} else {
    echo "Error, Use el Formulario";
}


/*
echo 'Usando $_GET';
echo var_dump($_GET);

if (isset($_GET['username'])) {
    echo $_GET['username'];
}

echo "<br />";

echo 'Usando $_POST';
echo var_dump($_POST);
if (isset($_POST['username'])) {
    echo $_POST['username'];
}
echo "<br />";

echo 'Usando $_REQUEST';
echo var_dump($_REQUEST);
echo $_REQUEST['username'];

echo "<br />";
*/
