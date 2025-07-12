<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "sqli_demo");
if ($mysqli->connect_error) {
    die("Error de conexión a la base de datos: " . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nueva_profesion'])) {
    $nuevaProfesion = $_POST['nueva_profesion'];
    $nombreUsuario = $_POST['usuario'];

    $queryUpdate = "UPDATE usuarios SET profesion = '$nuevaProfesion' WHERE usuario = '$nombreUsuario'";
    $resultUpdate = $mysqli->query($queryUpdate);

    if ($resultUpdate) {
        $_SESSION['profesion'] = $nuevaProfesion;
        header("Location: profile.php");
        exit;
    } else {
        echo "Error al actualizar profesión.";
    }
}
?>