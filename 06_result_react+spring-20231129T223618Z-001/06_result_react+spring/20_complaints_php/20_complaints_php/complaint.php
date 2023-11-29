<?php
require_once 'db.php';

session_start();

if (!isset($_SESSION['student_id'])) {
    header('Location: login.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $student_id = $_SESSION['student_id'];

    $stmt = $conn->prepare('INSERT INTO complaints (student_id, title, description) VALUES (?, ?, ?)');
    $stmt->bind_param('iss', $student_id, $title, $description);
    $stmt->execute();
    $stmt->close();

    echo 'Complaint registered successfully!';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Complaint Registration</title>
</head>
<body>
    <h2>Complaint Registration</h2>
    <form method="post" action="">
        Title: <input type="text" name="title" required><br>
        Description: <textarea name="description" required></textarea><br>
        <input type="submit" value="Register Complaint">
    </form>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
