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
$totalUsers = getTotalUsers();

$users = getAllUser($username);

if ($users === false) {
    echo "Error: User data not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <ul class="nav-links">
                <li><a href="../view/home.php" id="logo">StudyCompass</a></li>
                <li><a href="../view/home.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="../controller/logout.php" id="btnLogin">Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="admin-container">
        <aside class="sidebar">
            <h2>Dashboard</h2>
            <hr>
            <nav>
                <ul>
                    <li><a href="#">User Management</a></li>
                    <li><a href="#">Manage Universities</a></li>
                    <li><a href="#">Manage Scholarships</a></li>
                    <li><a href="#">Manage Articles</a></li>
                    <li><a href="#">System Analytics</a></li>
                    <li><a href="#">Settings</a></li>
                    <li><a href="../controller/logout.php">Logout</a></li>
                </ul>
            </nav>
        </aside>

        <main class="content">
            <h1>Welcome, Admin</h1>
            <section class="overview">
                <div class="card">
                    <h3>Total Users</h3>
                    <p><?= number_format($totalUsers) ?></p>
                </div>
                <div class="card">
                    <h3>Active Universities</h3>
                    <p>300</p>
                </div>
                <div class="card">
                    <h3>Scholarships</h3>
                    <p>150</p>
                </div>
                <div class="card">
                    <h3>Articles</h3>
                    <p>45</p>
                </div>
            </section>

            <section class="user-management">
                <h2>Recent User Activity</h2>
                <table>
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) { ?>
                            <tr>
                                <td><?= $user['id'] ?></td>
                                <td><?= $user['name'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td><?= $user['username'] ?></td>
                                <td>
                                    <a href="../controller/deleteUser.php?id=<?= $user['id'] ?>">Delete</a> |
                                    <a href="../controller/editUser.php?id=<?= $user['id'] ?>">Update</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>

</html>