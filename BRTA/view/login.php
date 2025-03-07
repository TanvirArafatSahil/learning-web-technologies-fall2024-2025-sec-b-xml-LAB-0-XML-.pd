<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - StudyCompass</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <ul class="nav-links">
                <li><a href="../view/home.php" id="logo">BRTA</a></li>
            </ul>
        </div>
    </nav>
    <div class="form">
        <div class="form-container login-container">
            <h2>Login</h2>
            <hr>
            <form method="post" action="../controller/loginCheck.php">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit">Login</button>
                </div>
            </form>
            <div class="switch">
                <p>Don't have an account? <a href="register.php">Register here</a></p>
            </div>
        </div>
    </div>
</body>

</html>