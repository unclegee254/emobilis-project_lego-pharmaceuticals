<?php

include "config.php";
session_start();

if(isset($_POST["submit"])){

    $email=mysqli_real_escape_string($conn, $_POST["email"]);
    $pass=mysqli_real_escape_string($conn, md5($_POST["password"]));

    $select=mysqli_query($conn, "SELECT * FROM `user_form` WHERE email='$email' AND password='$pass'") or die ("query failed");

    if(mysqli_num_rows($select) > 0){
        $row=mysqli_fetch_assoc($select);
        $_SESSION["user_id"] = $row["id"];
        header("location:index.php");
    }else{
        $message[]="Incorrect password or email does not exist!";
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
    <title>Lego-Login</title>

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
        <h3>User Login</h3>
        <input type="email" name="email" required placeholder="Enter email address" class="box">
        <input type="password" name="password" required placeholder="Enter password" class="box">
        <input type="submit" name="submit" class="btn" value="Login">
        <p>Don't have an account? <a href="register.php">Create account</a></p>
    </form>

</div>

</body>
</html>
