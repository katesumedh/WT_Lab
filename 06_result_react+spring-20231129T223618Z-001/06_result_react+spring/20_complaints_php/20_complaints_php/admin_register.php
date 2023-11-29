<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin_username = $_POST['admin_username'];
    $admin_password = password_hash($_POST['admin_password'], PASSWORD_DEFAULT);

    // Simple validation
    if (!empty($admin_username) && strlen($_POST['admin_password']) >= 6) {
        $stmt = $conn->prepare('INSERT INTO admin (username, password) VALUES (?, ?)');
        $stmt->bind_param('ss', $admin_username, $admin_password);
        $stmt->execute();
        $stmt->close();

        echo 'Admin registered successfully!';
    } else {
        echo 'Invalid admin credentials';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Registration</title>
</head>
<body>
    <h2>Admin Registration</h2>
    <form method="post" action="">
        Admin Username: <input type="text" name="admin_username" required><br>
        Admin Password: <input type="password" name="admin_password" required><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>
