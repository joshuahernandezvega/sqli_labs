<?php

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$mysqli = new mysqli("localhost", "root", "", "sqli_demo");
if ($mysqli->connect_error) {
    die("Error de conexión a la base de datos: " . $mysqli->connect_error);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Consultar Vacaciones</title>
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
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px #ccc;
            width: 340px;
        }
        .form-box h2 {
            text-align: center;
        }
        input[type=text] {
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
        }
        button:hover {
            background: #45a049;
        }
        .result {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="form-box">
        <h2>Consultar Vacaciones</h2>
        <form method="POST">
            <label>Nombre:</label>
            <input type="text" name="nombre" required>
            <label>Código:</label>
            <input type="text" name="codigo" required>
            <button type="submit">Buscar</button>
        </form>

        <div class="result">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $codigo = $_POST['codigo'];

            $sql1 = "SELECT datos_usuario.codigo, datos_usuario.nombre, datos_usuario.apellido FROM datos_usuario WHERE datos_usuario.nombre = '$nombre' AND datos_usuario.codigo = '$codigo'";
            $result1 = $mysqli->query($sql1);

            if ($result1 && $result1->num_rows > 0) {
                while ($row = $result1->fetch_assoc()) {
                    echo "<p><strong>{$row['nombre']} {$row['apellido']}</strong></p>";
                }
            } else {
                echo "<p>No se encontraron resultados para el nombre '$nombre'.</p>";
            }

            $sql2 = "SELECT otros_usuario.codigo, otros_usuario.dias_vacaciones FROM otros_usuario WHERE otros_usuario.codigo = '$codigo'";
            $result2 = $mysqli->query($sql2);

            if ($result2 && $result2->num_rows > 0) {
                while ($row = $result2->fetch_assoc()) {
                    echo "<p><strong>Código:</strong> {$row['codigo']}<br><strong>Días de vacaciones:</strong> {$row['dias_vacaciones']}</p>";
                }
            } else {
                echo "<p>No se encontraron resultados para el código '$codigo'.</p>";
            }
        }
        ?>
        </div>
    </div>
</body>
</html>

