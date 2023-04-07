<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body onload = "setInterval('getMessage(), 100')">
<form onsubmit = "sendMessage()">
    <label for="message">Write a Message</label>
    <input type="text" id="message" name="message">
    <button type="submit" >Submit</button>
</form>
<div style="display:flex ; flex=direction: column;">
<P>Number of message sent : </span id = "counter"></span></p>
</div>

<script>
    function sendMessage(){
        const message = document.getElementById("message").value;
        if(message){
            const url = "target_php.php?message = " + encodeURIComponent(message);
            const request = new XMLHttpRequest();
            request.open('GET' , url);
            request.send();
        }
    }

    const request = new XMLHttpRequest();
    request.onreadystatechange = function(){
        if(this.readyState == 4 && this.state == 200){
            document.getElementById("counter").innerHTML = this.responseText;
        }
    };
    request.open("GET", "counter.php");
    request.send();
 </script>  

</body>
</html>
<?php
    session_start();
    if(!isset($_SESSION["counter"])){
        $_SESSION['counter'] = 0;
    }
    $_SESSION["counter"]++;
    echo $_SESSION["counter"];
?>