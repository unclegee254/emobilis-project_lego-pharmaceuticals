<?php

include "config.php";

if(isset($_POST["submit"])){

    $name=mysqli_real_escape_string($conn, $_POST["name"]);
    $email=mysqli_real_escape_string($conn, $_POST["email"]);
    $pass=mysqli_real_escape_string($conn, md5($_POST["password"]));
    $cpass=mysqli_real_escape_string($conn, md5($_POST["cpassword"]));

    $select=mysqli_query($conn, "SELECT * FROM `user_form` WHERE email='$email' AND password='$pass'") or die ("query failed");

    if(mysqli_num_rows($select) > 0){
        $message[]="User already exists!";
    }else{
        mysqli_query($conn, "INSERT INTO `user_form`(`id`, `name`, `email`, `password`) VALUES ('$id', '$name','$email','$pass')") or die("query failed");
        $message[]="Account created!";
        header("location:login.php");

    }

}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lego-Register</title>

<!--    Custom css -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
if(isset($message)){
    foreach ($message as $message){
        echo "<div class='message' onclick='this.remove();'>".$message."</div>>";
    }
}

?>

<div class="form-container">
    <form action=""method="post">
        <h3>Create Account</h3>
        <input type="text" name="name" required placeholder="Enter username" class="box">
        <input type="email" name="email" required placeholder="Enter email address" class="box">
        <input type="password" name="password" required placeholder="Enter password" class="box">
        <input type="password" name="cpassword" required placeholder="Confirm password" class="box">
        <input type="submit" name="submit" class="btn" value="register now">
        <p>Already have an account? <a href="login.php">Login</a></p>
    </form>

</div>

</body>
</html>