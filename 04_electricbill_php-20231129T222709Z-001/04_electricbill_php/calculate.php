<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve units from the form
    $units = $_POST["units"];

    // Calculate the electric bill based on the given conditions
    $totalCost = 0;

    if ($units <= 50) {
        $totalCost = $units * 3.50;
    } elseif ($units <= 150) {
        $totalCost = (50 * 3.50) + (($units - 50) * 4.00);
    } elseif ($units <= 250) {
        $totalCost = (50 * 3.50) + (100 * 4.00) + (($units - 150) * 5.20);
    } else {
        $totalCost = (50 * 3.50) + (100 * 4.00) + (100 * 5.20) + (($units - 250) * 6.50);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Electric Bill Calculator</title>
</head>
<body>
    <div class="container">
        <h2>Electric Bill Calculator</h2>

        <?php
        if (isset($totalCost)) {
            echo "<p>The total cost for $units units is Rs. $totalCost</p>";
        }
        ?>

        <a href="index.html">Go back</a>
    </div>
</body>
</html>
