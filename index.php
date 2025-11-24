<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Call Annie Clone</title>

<style>
body{
    margin:0;
    font-family: Arial;
    background:#0d0d0d;
    color:white;
    text-align:center;
}

.header{
    padding:20px;
    font-size:30px;
    font-weight:bold;
}

.container{
    margin-top:60px;
}

.btn{
    background:#ff9800;
    color:white;
    padding:15px 30px;
    border:none;
    border-radius:30px;
    font-size:20px;
    cursor:pointer;
    transition:0.3s;
}
.btn:hover{
    background:#ffa726;
}

.desc{
    font-size:20px;
    width:70%;
    margin:auto;
    color:#bdbdbd;
}
</style>

<script>
function goToLogin(){
    window.location.href = "login.php";
}
</script>

</head>
<body>

<div class="header">Call Annie – AI Voice Companion (Clone)</div>

<div class="container">
    <p class="desc">Talk with an AI friend in real-time using voice and text.</p>
    <br><br>
    <button class="btn" onclick="goToLogin()">Start Chat</button>
</div>

</body>
</html>
