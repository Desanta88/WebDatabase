<?php
    session_start();
    if(isset($_SESSION['User'])==false){
        header("location:/WebDatabase/index.html");
    }
?>
<html>
    <head>
        <title>Home Page</title>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    </head>
    <body style="background-color:#f0f8ff">
        <h1 style="color:red;" align="center">Databases</h1><br><br><br>
        <div style="text-align: center;">
            <button align="center" onclick="location.href='/WebDatabase/Speedrun.php'" class="btn btn-primary">Speedrun database</button>
            <button onclick="location.href='/WebDatabase/Speedrunner.php'" class="btn btn-primary">Speedrunner database</button>
            <button onclick="location.href='/WebDatabase/Videogame.php'" class="btn btn-primary">Videogame database</button>
            <button onclick="location.href='/WebDatabase/Person.php'" class="btn btn-primary">Person database</button>
            <button onclick="location.href='/WebDatabase/Editor.php'" class="btn btn-primary">Editor database</button>
            <br><br><br>
            <button onclick="location.href='/WebDatabase/Logout.php'" class="btn btn-primary">Log Out</button>
        </div>
    </body>
</html>