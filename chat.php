<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
?>
<!DOCTYPE html>
<html>
<head>
<title>AI Chat</title>
<meta charset="UTF-8">

<style>
body{background:#0d1117;color:white;font-family:Arial;padding:30px;text-align:center;}
#box{width:80%;margin:auto;background:#161b22;padding:20px;border-radius:10px;}
input{width:80%;padding:15px;border:none;border-radius:10px;font-size:18px;}
button{padding:15px 25px;font-size:18px;border:none;border-radius:10px;color:white;margin:5px;cursor:pointer;}
#sendBtn{background:#238636;}
#voiceBtn{background:#6a1b9a;}
#callBtn{background:#0077ff;}
#resp{margin-top:20px;background:#21262d;padding:20px;border-radius:10px;min-height:70px;text-align:left;}
</style>

</head>
<body>

<div id="box">
    <h2>AI Chat</h2>

    <input id="msg" placeholder="Type message...">

    <br><br>

    <button id="sendBtn" onclick="sendToAI()">Send</button>
    <button id="voiceBtn" onclick="startVoice()">🎤 Voice</button>
    <button id="callBtn" onclick="startCall()">📞 Voice Call</button>

    <div id="resp"></div>
</div>

<script>
// ======================= SEND MESSAGE ===========================
function sendToAI(){
    let text = document.getElementById("msg").value.trim();
    if(text === "") return;

    fetch("ai.php", {
        method:"POST",
        headers:{"Content-Type":"application/json"},
        body:JSON.stringify({message:text})
    })
    .then(r=>r.text())
    .then(t=>{
        let data;
        try{ data = JSON.parse(t); }
        catch(e){
            document.getElementById("resp").innerHTML = "❌ Invalid JSON:<br>"+t;
            return;
        }

        let reply = data?.choices?.[0]?.message?.content ?? "⚠️ No reply from AI";

        document.getElementById("resp").innerHTML = reply;

        speak(reply);
    });
}

// ======================= VOICE INPUT ===========================
function startVoice(){
    if(!("webkitSpeechRecognition" in window)){
        alert("Mic not supported.");
        return;
    }

    let rec = new webkitSpeechRecognition();
    rec.lang = "en-US";
    rec.onresult = e=>{
        let txt = e.results[0][0].transcript;
        document.getElementById("msg").value = txt;
        sendToAI();
    };
    rec.start();
}

// ======================= VOICE OUTPUT ===========================
function speak(text){
    let u = new SpeechSynthesisUtterance(text);
    u.lang = "en-US";
    speechSynthesis.speak(u);
}

// ======================= CALL BUTTON ===========================
function startCall(){
    window.open("voicecall.php","_blank","width=400,height=600");
}
</script>

</body>
</html>
