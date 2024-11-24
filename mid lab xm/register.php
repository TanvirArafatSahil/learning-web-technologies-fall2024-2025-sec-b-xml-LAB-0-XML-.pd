<?php
if (isset($_post['submit'])) {
    $username=trim($_post['username']);
    $password=trim($_post['password']);
    $email=trim($_post['email']);



    if(empty($name)) {
        $error="Name cannot be empty.";
    }else{
        $success="Form submitted successfully!";
    }

    if(empty($password)) {
        $error="password cannot be error.";
    }elseif(count(value:$password))

    
}