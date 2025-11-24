<?php
require "db.php";
$msg = "";

if(isset($_POST['signup'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $check = $conn->prepare("SELECT * FROM users WHERE email=?");
    $check->execute([$email]);

    if($check->rowCount() > 0){
        $msg = "Email already exists.";
    } else {
        $insert = $conn->prepare("INSERT INTO users (name,email,password) VALUES (?,?,?)");
        $insert->execute([$name, $email, $pass]);
        header("Location: login.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Signup</title>

<style>
body{
    background:#121212;
    color:white;
    font-family:Arial;
}
.box{
    width:350px;
    padding:30px;
    background:#1e1e1e;
    margin:auto;
    margin-top:90px;
    border-radius:10px;
    text-align:center;
}
input{
    width:90%;
    padding:12px;
    margin:10px 0;
    border-radius:5px;
    border:none;
}
.btn{
    padding:12px 20px;
    background:#ff9800;
    border:none;
    border-radius:5px;
    cursor:pointer;
    color:white;
}
</style>

</head>
<body>

<div class="box">
<h2>Create Account</h2>

<form method="POST">
<input type="text" name="name" placeholder="Full Name" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<br>
<button class="btn" name="signup">Signup</button>
</form>

<p style="color:red;"><?= $msg ?></p>

</div>

</body>
</html>
