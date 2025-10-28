<?php
session_start();
include('../common/connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password']; 

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if ($user['status'] != 'active') {
            $_SESSION['error'] = "Usuario inactivo. Contacte al administrador.";
            header("Location: ../index.php");
            exit();
        }

        if ($password == $user['password']) {
            // ACTUALIZAR LAST LOGIN
            $update_sql = "UPDATE users SET last_login_datetime = NOW() WHERE id = " . $user['id'];
            mysqli_query($conn, $update_sql);

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['firstname'] = $user['name'];
            $_SESSION['role'] = $user['role'];

            header("Location: ../pages/dashboard.php");
            exit();
        } else {
            $_SESSION['error'] = "Contraseña incorrecta.";
            header("Location: ../index.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Usuario no encontrado.";
        header("Location: ../index.php");
        exit();
    }
}
?>