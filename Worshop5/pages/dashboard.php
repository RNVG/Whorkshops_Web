<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
</head>

<body>
  <h1>Welcome to the Dashboard</h1>
  <p>This is a protected area of the website.</p>
  <?php
  session_start();

  if (isset($_SESSION['username'])) {
    echo "<p>Hello, " . htmlspecialchars($_SESSION['firstname']) . "!</p>";
  } else {
    header("Location: /index.php");
    exit();
  }
  ?>
  <a href="../actions/logout.php">Logout</a>

  <?php
  
  include('../common/connection.php');
  $sql = "SELECT id, name, lastName, username, role, status, last_login_datetime FROM users";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    echo "<h2>Users</h2>";
    echo "<table border='1'>
              <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Last Name</th>
                  <th>Username</th>
                  <th>Role</th>
                  <th>Actions</th>
              </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>
                  <td>" . $row['id'] . "</td>
                  <td>" . htmlspecialchars($row['name']) . "</td>
                  <td>" . htmlspecialchars($row['lastName']) . "</td>
                  <td>" . htmlspecialchars($row['username']) . "</td>
                  <td>" . htmlspecialchars($row['role']) . "</td>
                  <td>
                      <a href='/pages/editUser.php?id=" . $row['id'] . "'>Edit</a> |
                      <a href='/actions/deleteUser.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure?')\">Delete</a>
                  </td>
                </tr>";
    }
    echo "</table>";
  } else {
    echo "No users found.";
  }
  mysqli_close($conn);

  ?>
</body>

</html>