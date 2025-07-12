<?php
$mysqli = new mysqli("localhost", "root", "", "sqli_demo");
if ($mysqli->connect_error) {
    die("Error de conexión a la base de datos: " . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $profesion = $_POST['profesion'];
    $contrasena = $_POST['contrasena'];

    $query = "INSERT INTO usuarios (usuario, profesion, contrasena) VALUES ('$usuario', '$profesion', '$contrasena')";
    if ($mysqli->query($query)) {
        header("Location: login.php");
    } else {
        $error = "Error al registrar usuario.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registro de Usuario</title>
    <style>
    body {
        font-family: Arial;
        background: #f0f0f0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    .form-box {
        background: white;
        padding: 30px 25px;
        border-radius: 8px;
        box-shadow: 0 0 10px #ccc;
        width: 300px;
    }
    .form-box h2 {
        text-align: center;
    }
    input[type=text], input[type=password] {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    button {
        width: 100%;
        padding: 10px;
        background: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px;
    }
    button:hover {
        background: #45a049;
    }
</style>
</head>
<body>
    <div class="form-box">
        <h2>Registro de Usuario</h2>
        <form method="POST">
            <label>Usuario:</label><br>
            <input type="text" name="usuario" required><br>
            <label>Profesión:</label><br>
            <input type="text" name="profesion" required><br>
            <label>Contraseña:</label><br>
            <input type="password" name="contrasena" required><br>
            <button type="submit">Registrar</button>
        </form>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    </div>
</body>
</html>
