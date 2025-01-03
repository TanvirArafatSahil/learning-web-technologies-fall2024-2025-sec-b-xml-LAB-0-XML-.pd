<?php
session_start();
if (!isset($_COOKIE['status'])) {
    header('location: login.php');
}

if (!isset($_COOKIE['status']) && !isset($_SESSION['username'])) {
    header('location: login.php');
    exit();
}

$username = $_SESSION['username'];

require_once('../model/authModel.php');

$user = getUser($username);

if ($user === false) {
    echo "Error: User data not found.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
<nav class="navbar">
        <div class="container">
            <ul class="nav-links">
                <li><a href="../view/home.php" id="logo">BRTA</a></li>
                <li><a href="../view/home.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="../view/profile.php" id="btnReg">Profile</a></li>
            </ul>
        </div>
    </nav>
   

        <main class="content">
            <h1>Welcome, <?= htmlspecialchars($user['username']); ?></h1>
            <section id="userWidget" class="profile-info">
                <h2>Profile Information</h2>
                <p><strong>Name:</strong> <?= htmlspecialchars($user['name']); ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($user['email']); ?></p>
                <p><strong>Age:</strong> <?= htmlspecialchars($user['age']); ?></p>
                <p><strong>Date of Birth:</strong> <?= htmlspecialchars($user['dob']); ?></p>
               


            <div class="dashboard-container">
        <aside class="sidebar">
            <h2>Dashboard</h2>
            <hr>
            <nav>
                <ul>
                    <li><a href="../view/vehicleReg.php">vehicleReg</a></li>
                    <li><a href="../view/taxtoken.php">apply_tax</a></li>
                    <li><a href="../view/Payment.php">Payment Gateway</a></li>
                    <li><a href="../view/AppRejVR.php">Approve/Reject Vehicle Registration Applications</a></li>
                    <li><a href="#">Approve/Reject Tax Token Applications</a></li>
                    <li><a href="../controller/logout.php">Logout</a></li>
                </ul>
            </nav>
        </aside>

           
        </main>
    </div>
</body>
</html>