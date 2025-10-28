<?php
  session_start();
  if (isset($_SESSION['username'])) {
      header("Location: /Worshop5/pages/dashboard.php");
      exit();
  }


  $error = '';
  $success = '';
  if (isset($_SESSION['error'])) {
      $error = $_SESSION['error'];
      unset($_SESSION['error']); 
  }
  if (isset($_SESSION['success'])) {
      $success = $_SESSION['success'];
      unset($_SESSION['success']);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
  <h1>Login</h1>
  <?php if ($success): ?>
    <div style="color: green;"><?php echo $success; ?></div>
  <?php endif; ?>
  <?php if ($error): ?>
    <div style="color: red;"><?php echo $error; ?></div>
  <?php endif; ?>
  <form action="actions/login.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <button type="submit">Login</button>

    <p>Don't have an account? <a href="pages/registration.php">Register here</a></p>
  </form>
</body>
</html>