<?php
session_start();
include('../common/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']); // Sin MD5
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);

    $sql = "INSERT INTO users (name, lastName, username, password, role, status)
            VALUES ('$name', '$lastName', '$username', '$password', 'user', 'active')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Usuario registrado exitosamente";
        header("Location: ../index.php");
        exit();
    } else {
        $_SESSION['error'] = "Error al registrar usuario: " . mysqli_error($conn);
        header("Location: ../pages/registration.php");
        exit();
    }

    mysqli_close($conn);
}
?>