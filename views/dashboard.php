<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit();
}

$username = $_SESSION['username'];
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>

<body>
    <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
    <p>Email: <?php echo htmlspecialchars($email); ?></p>
    <a href="../controllers/AuthController.php?action=logout">Logout</a>
</body>

</html>