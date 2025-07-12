<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
$nombre = $_SESSION['usuario'];
$profesion = $_SESSION['profesion'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Perfil</title>
    
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
        .profile-box {
            background: white;
            padding: 30px 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px #ccc;
            text-align: center;
            width: 320px;
        }
        input[type=text] {
            padding: 10px;
            width: 100%;
            margin-top: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .button-group {
            margin-top: 15px;
            display: flex;
            justify-content: space-between;
        }
        .button-group button, .button-group a button {
            flex: 1;
            padding: 10px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            margin: 0 5px;
            cursor: pointer;
        }
        .button-group button:hover, .button-group a button:hover {
            background: #45a049;
        }
    </style>

</head>
<body>
    <div class="profile-box">
        <h2>Perfil de Usuario</h2>
        <p>¡Bienvenido, <b><?= htmlspecialchars($nombre) ?></b>, <?= htmlspecialchars($profesion) ?>!</p>
        <form method="POST" action="update.php">
            <input type="hidden" name="usuario" value="<?= htmlspecialchars($nombre) ?>">
            <input type="text" name="nueva_profesion" placeholder="Actualizar profesión">
           
        
            
    <div class="button-group">
        <button type="submit">Actualizar</button>
        <a href="vacaciones.php"><button type="button">Consultar vacaciones</button></a>
        <a href='logout.php'><button type="button">Cerrar sesión</button></a>
    </div>
    
        </form>
    </div>
</body>
</html>
