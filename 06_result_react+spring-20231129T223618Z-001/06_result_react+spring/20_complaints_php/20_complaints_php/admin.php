<?php
require_once 'db.php';

session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
}

$stmt = $conn->prepare('SELECT c.id, s.username, c.title, c.description, c.status FROM complaints c JOIN students s ON c.student_id = s.id');
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Admin Dashboard</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Student</th>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['username'] ?></td>
            <td><?= $row['title'] ?></td>
            <td><?= $row['description'] ?></td>
            <td><?= $row['status'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
