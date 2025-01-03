<?php
session_start();
require_once('../model/authModel.php');

$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

if (!$id) {
    echo "User ID is missing!";
    exit();
}

$con = getConnection();
$sql = "SELECT * FROM users WHERE id='{$id}'";
$result = mysqli_query($con, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "User not found!";
    exit();
}

$user = mysqli_fetch_assoc($result);
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
    <nav class="navbar">
        <div class="container">
            <ul class="nav-links">
                <li><a href="../view/home.php" id="logo">StudyCompass</a></li>
            </ul>
        </div>
    </nav>
    <div class="form">
        <div class="form-container register-container">
            <h2>Edit User</h2>
            <form method="post" action="../controller/updateUser.php">
                <!-- Hidden ID Field to Pass User ID -->
                <input type="hidden" name="id" value="<?= $user['id'] ?>">

                <div class="row">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label for="reg-username">Username</label>
                        <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="reg-password">Password</label>
                        <input type="password" name="password" value="<?= htmlspecialchars($user['password']) ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" name="age" value="<?= htmlspecialchars($user['age']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" required>
                            <option value="male" <?= ($user['gender'] == 'male') ? 'selected' : '' ?>>Male</option>
                            <option value="female" <?= ($user['gender'] == 'female') ? 'selected' : '' ?>>Female</option>
                            <option value="other" <?= ($user['gender'] == 'other') ? 'selected' : '' ?>>Other</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input type="date" name="dob" value="<?= htmlspecialchars($user['dob']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" value="<?= htmlspecialchars($user['address']) ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <button name="submit" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>