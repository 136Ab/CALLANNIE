<?php
session_start();
if(!isset($_SESSION['user_id'])){ header("Location: login.php"); exit; }
?>
<!DOCTYPE html>
<html>
<head>
<title>Profile</title>

<style>
body{ background:#121212; color:white; font-family:Arial; }
.box{
    width:350px;
    margin:auto;
    margin-top:80px;
    padding:30px;
    background:#1e1e1e;
    border-radius:10px;
    text-align:center;
}
.btn{
    padding:10px;
    background:#ff9800;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
}
</style>

</head>
<body>
<div class="box">
<h2>Your Profile</h2>
<p>User ID: <?= $_SESSION['user_id'] ?></p>
<br>
<button class="btn" onclick="window.location.href='logout.php'">Logout</button>
</div>
</body>
</html>
