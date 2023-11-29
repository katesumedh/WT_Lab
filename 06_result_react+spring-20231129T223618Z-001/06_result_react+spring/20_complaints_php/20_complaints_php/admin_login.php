<?php
require_once 'db.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];

    // Simple validation example (you need to replace this with your actual validation logic)
    $stmt = $conn->prepare('SELECT * FROM admin WHERE username = ?');
    $stmt->bind_param('s', $admin_username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row && password_verify($admin_password, $row['password'])) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: admin.php');
    } else {
        echo 'Invalid admin credentials';
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
</head>
<body>
    <h2>Admin Login</h2>
    <form method="post" action="">
        Admin Username: <input type="text" name="admin_username" required><br>
        Admin Password: <input type="password" name="admin_password" required><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
