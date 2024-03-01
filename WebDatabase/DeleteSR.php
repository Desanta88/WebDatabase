<?php
    $server="localhost";
    $username="programma";
    $password="12345";
    $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $usernamegame=explode("-",$_GET["SpeedrunD"]);
    $user=$usernamegame[0];
    $game=$usernamegame[1];
    $query="DELETE FROM speedrun WHERE Speedrunner=(SELECT Id FROM speedrunner WHERE Username=:type) AND Videogame=(SELECT Id FROM videogame WHERE Title=:type2)";
    $statement=$connection->prepare($query);
    $statement->bindParam(":type",$user,PDO::PARAM_STR);
    $statement->bindParam(":type2",$game,PDO::PARAM_STR);
    $statement->execute();
    header("location:/WebDatabase/Speedrun.php");
?>