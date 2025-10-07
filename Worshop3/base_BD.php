<?php
function conectarBD() {
    $host = "127.0.0.1";
    $user = "root";
    $pass = "";
    $db   = "worshop3";

    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_errno) {
        die("Error al conectar: " . $conn->connect_error);
    }
    $conn->set_charset("utf8mb4");
    return $conn;
}

function obtenerProvincias() {
    $conn = conectarBD();
    $sql = "SELECT nombre FROM provincias ORDER BY nombre ASC";
    $rs  = $conn->query($sql);

    $lista = [];
    if ($rs && $rs->num_rows > 0) {
        while ($row = $rs->fetch_assoc()) {
            $lista[] = $row['nombre'];
        }
    }
    $conn->close();
    return $lista;
}