<?php
session_start();

if(isset($_SESSION['user_data'])){
    $userData= $_SESSION['user_data'];

    $id=$userData['ID'];
    $pass=$userData['Pass'];
    echo $id . $pass;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <h1>Login</h1>
        <table>
            <tr>
                <td>UserID= </td>
        <td><input type="text" name="n"/></td>
</tr>
<tr>
    <td>Pass= </td>
<td><input type="text" name="p"/></td>
</tr>
        <td><input type="submit" name="submit" value="login"/></td>
        <td> <a href='reg.html'>Register</a> </td>

</table>

    </form>
</body>
</html>


<?php
if(isset($_POST['submit'])){
    $n=$_POST['n'];
    $p=$_POST['p'];
    echo $n.$p;

    if(!empty($n) && !empty($p)){
    if($n == $id && $p == $pass){
        echo "Login Successful";
        $file_contents = file_get_contents("newfile.txt");

        if (strpos($file_contents, 'User Type: Admin') !== false) {
           
            header('Location: adminhome.php');
            exit();
            
        } elseif(strpos($file_contents, 'User Type: User') !== false) {
            
            header('Location: userhome.php');
            exit();
           
        }


    }elseif($n!=$id){

        echo "Wrong User ID";
    }
    elseif($p != $pass){
        echo "Wrong Password";
    }
    }
    else{
        echo "Enter Valid UserID & Password";
    }
}
?>