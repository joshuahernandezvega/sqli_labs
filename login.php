<?php
$mysqli = new mysqli("localhost", "root", "", "sqli_demo");
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $query = "SELECT profesion, usuario FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
    $result = $mysqli->query($query);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['usuario'] = $row['usuario'];
        $_SESSION['profesion'] = $row['profesion'];
        header("Location: profile.php");
    } else {
        $error = "Credenciales incorrectas.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Demo SQLi</title>
    
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
        .login-box {
            background: white;
            padding: 30px 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px #ccc;
            width: 300px;
        }
        .login-box h2 {
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
        .button-row {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }
        .button-row button {
            flex: 1;
            padding: 10px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            margin: 0 5px;
            cursor: pointer;
        }
        .button-row button:hover {
            background: #45a049;
        }
    </style>

</head>
<body>
    <div class="login-box">
        <h2>Login Demo SQLi</h2>
        <form method="POST">
            <label>Usuario:</label><br>
            <input type="text" name="usuario" required><br>
            <label>Contraseña:</label><br>
            <input type="password" name="contrasena" required><br>
            
        <div class="button-row">
            <button type="submit">Login</button>
            <a href='register.php'><button type='button'>Registrar</button></a>
        </div>
        </form>
    
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    </div>
</body>
</html>
