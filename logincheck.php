<?php
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]); 

    if (empty($name)) {
        $error = "Name cannot be empty.";
    } elseif (str_word_count($name) < 2) {
        $error = "Name must contain at least two words.";
    } elseif (!preg_match("/^[a-zA-Z]/", $name)) {
        $error = "Name must start with a letter.";
    } elseif (!preg_match("/^[a-zA-Z .-]+$/", $name)) {
        $error = "Name can contain only letters, periods, and dashes.";
    } else {
        $success = "Form submitted successfully!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Validation Results</title>
    <style>
        .error {
            color: red;
            font-size: 0.9em;
        }
        .success {
            color: green;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div>
        <h2>Validation Results</h2>
        <?php if (!empty($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php elseif (!empty($success)): ?>
            <p class="success"><?php echo $success; ?></p>
        <?php endif; ?>
        <a href="login.html">Go back</a>
    </div>
</body>
</html>