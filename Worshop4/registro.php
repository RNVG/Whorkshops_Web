<?php
require_once "base_BD.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

// Instancias
$bd   = new BaseBD();
$conn = $bd->getConexion();
$repo = new UsuarioBD($conn);

// Contruir objeto
$usuario = new Usuario(
    trim($_POST["nombre"]    ?? ""),
    trim($_POST["apellidos"] ?? ""),
    trim($_POST["username"]  ?? ""),
    trim($_POST["provincia"] ?? "")
);

// Esto lo puedo quitar
if (!$usuario->esValido()) {
    $bd->cerrar();
    exit("Faltan datos obligatorios. <a href='index.php'>Volver</a>");
}

// Guardar y redirigir
if ($repo->guardar($usuario)) {
    $bd->cerrar();
    header("Location: login.php?username=" . urlencode($usuario->username));
    exit;
}

$bd->cerrar();
exit("Error al guardar. <a href='index.php'>Volver</a>");