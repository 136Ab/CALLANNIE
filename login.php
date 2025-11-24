<?php
require "db.php";
session_start();

$msg = "";

if(isset($_POST['login'])){
    $email = $_POST['email'];

    $check = $conn->prepare("SELECT * FROM users WHERE email=?");
    $check->execute([$email]);
    $user = $check->fetch(PDO::FETCH_ASSOC);

    if($user && password_verify($_POST['password'], $user['password'])){
        $_SESSION['user_id'] = $user['id'];
        echo "<script>window.location='chat.php';</script>";
    } else {
        $msg = "Invalid login details.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>

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
<h2>Login</h2>

<form method="POST">
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<br>
<button class="btn" name="login">Login</button>
</form>

<p style="color:red;"><?= $msg ?></p>

</div>

</body>
</html>
