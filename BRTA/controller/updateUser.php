<?php
session_start();
require_once('../model/authModel.php');

if (isset($_REQUEST['submit'])) {
    $id = $_REQUEST['id'];  // Get the user ID from the form
    $name = trim($_REQUEST['name']);
    $email = trim($_REQUEST['email']);
    $username = trim($_REQUEST['username']);
    $password = trim($_REQUEST['password']);
    $age = trim($_REQUEST['age']);
    $dob = trim($_REQUEST['dob']);
    $gender = trim($_REQUEST['gender']);
    $address = trim($_REQUEST['address']);

    if (empty($id) || empty($name) || empty($email) || empty($username) || empty($password) || empty($age) || empty($dob) || empty($gender) || empty($address)) {
        echo "All fields are required!";
    } else {
        // Hash the password before updating
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $status = updateUser($id, $name, $email, $username, $hashed_password, $age, $dob, $gender, $address);

        if ($status) {
            $_SESSION['success_message'] = "User updated successfully!";
            header('location: ../view/home.php');
            exit();
        } else {
            $_SESSION['error_message'] = "Update failed. Try again.";
            header('location: ../view/editUser.php?id=' . $id);
            exit();
        }
    }
} else {
    header('location: ../view/home.php');
    exit();
}