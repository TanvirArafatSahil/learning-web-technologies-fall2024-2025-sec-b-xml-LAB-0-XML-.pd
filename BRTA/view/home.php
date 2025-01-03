<?php
session_start();
require_once('../model/authModel.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudyCompass - Home</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <ul class="nav-links">
                <li><a href="" id="logo">BRTA</a></li>
                <li><a href="">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>

                <?php if (isset($_SESSION['username'])): ?>
                    <?php
                    $username = $_SESSION['username'];
                    $admin = getAdmin($username);
                    $user = getUser($username);
                    ?>

                    <?php if ($admin): ?>
                        <li><a href="../view/adminDashboard.php">Admin Dashboard</a></li>
                    <?php elseif ($user): ?>
                        <li><a href="../view/userDashboard.php">User Dashboard</a></li>
                    <?php endif; ?>

                    <li><a href="../controller/logout.php" id="btnLogin">Logout</a></li>
                <?php else: ?>
                    <li><a href="../view/login.php" id="btnLogin">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>


    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>BRTA service portal </h1>
            
            <div class="hero-buttons">
                <a href="../view/login.php" class="btn primary">Get Started</a>
                <a href="./view/aboutUs.html" class="btn secondary">Learn More</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <ul class="footer-links">
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Terms of Service</a></li>
                <li><a href="#">Support</a></li>
            </ul>
        </div>
        <div>
            <p>StudyCompass &copy; 2024. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>