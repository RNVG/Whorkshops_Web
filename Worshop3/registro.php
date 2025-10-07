<?php
require_once __DIR__ . "/base_BD.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre    = trim($_POST["nombre"] ?? "");
    $apellidos = trim($_POST["apellidos"] ?? "");
    $username  = trim($_POST["username"] ?? "");
    $provincia = trim($_POST["provincia"] ?? "");

    if ($nombre === "" || $apellidos === "" || $username === "" || $provincia === "") {
        exit("Faltan datos obligatorios. <a href='index.php'>Volver</a>");
    }

    $conn = conectarBD();

    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellidos, username, provincia) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        exit("Error al preparar la consulta: " . $conn->error);
    }

    $stmt->bind_param("ssss", $nombre, $apellidos, $username, $provincia);

    if ($stmt->execute()) {
        // 🔹 Redirigir al login con el username
        header("Location: login.php?username=" . urlencode($username));
        exit;
    } else {
        echo "Error al guardar: " . $stmt->error . ' <a href="index.php">Volver</a>';
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: index.php");
    exit;
}