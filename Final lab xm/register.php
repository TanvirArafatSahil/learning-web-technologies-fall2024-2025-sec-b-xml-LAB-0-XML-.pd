<?php
session_start();
$conn = new mysqli("localhost", "root", "", "shop_management");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $query = $conn->prepare("INSERT INTO employees (name, contact, username, password) VALUES (?, ?, ?, ?)");
    $query->bind_param("ssss", $name, $contact, $username, $password);

    if ($query->execute()) {
        echo "<script>alert('Registration successful');</script>";
        header("Location: index.php");
    } else {
        echo "<script>alert('Error: Username already exists');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <script>
        function validateForm() {
            let name = document.forms["regForm"]["name"].value;
            let contact = document.forms["regForm"]["contact"].value;
            let username = document.forms["regForm"]["username"].value;
            let password = document.forms["regForm"]["password"].value;

            if (!name || !contact || !username || !password) {
                alert("All fields are required");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h2>Register</h2>
    <form name="regForm" method="POST" onsubmit="return validateForm()">
        <input type="text" name="name" placeholder="Name" required><br>
        <input type="text" name="contact" placeholder="Contact Number" required><br>
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>