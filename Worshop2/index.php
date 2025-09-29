<?php
$host = "127.0.0.1";
$user = "root";
$pass = "";
$db   = "worshop2"; 


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $nombre   = isset($_POST["nombre"])   ? trim($_POST["nombre"])   : "";
    $apellido = isset($_POST["apellido"]) ? trim($_POST["apellido"]) : "";
    $correo   = isset($_POST["correo"])   ? trim($_POST["correo"])   : "";
    $telefono = isset($_POST["telefono"]) ? (int)$_POST["telefono"]  : 0;

    // Conectar
    $mysqli = new mysqli($host, $user, $pass, $db);
    if ($mysqli->connect_errno) {
        die("Error de conexión: " . $mysqli->connect_error);
    }

    $sql  = "INSERT INTO usuarios (nombre, apellido, correo, telefono) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    if (!$stmt) {
        die("Error al preparar la consulta: " . $mysqli->error);
    }

   
    $stmt->bind_param("sssi", $nombre, $apellido, $correo, $telefono);

    if ($stmt->execute()) {
        echo "<h2>Registro guardado correctamente.</h2>";
        echo '<p><a href="index.html">Volver al formulario</a></p>';
    } else {
        echo "Error al guardar: " . $stmt->error;
    }

    $stmt->close();
    $mysqli->close();
} else {
   
    header("Location: index.html");
    exit;
}