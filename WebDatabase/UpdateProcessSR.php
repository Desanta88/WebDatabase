<?php
    $runner=$_GET["speedrunner"];
    $game=$_GET["videogame"];
    $date=$_GET["date"];
    $time=$_GET["time"];
    $leaderboardNumber=$_GET["leaderboardnumber"];
    $platform=$_GET["platform"];
    $usernamegame=explode("-",$_GET["SpeedrunU"]);
    $choosenUsername=$usernamegame[0];
    $choosenGame=$usernamegame[1];
    $server="localhost";
    $username="programma";
    $password="12345";
    $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $queryS="UPDATE speedrun sr SET Speedrunner=(SELECT Id FROM speedrunner WHERE Username=:type ),Videogame=(SELECT Id FROM videogame WHERE Title=:type2),sr.Date=:type3,sr.Time=:type4,LeaderboardNumber=:type5,Platform=:type6 WHERE Speedrunner=(SELECT Id FROM speedrunner WHERE Username=:type7) AND Videogame=(SELECT Id FROM videogame WHERE Title=:type8)";
    $statement=$connection->prepare($queryS);
    $statement->bindParam(":type",$runner,PDO::PARAM_STR);
    $statement->bindParam(":type2",$game,PDO::PARAM_STR);
    $statement->bindParam(":type3",$date,PDO::PARAM_STR);
    $statement->bindParam(":type4",$time,PDO::PARAM_STR);
    $statement->bindParam(":type5",$leaderboardNumber,PDO::PARAM_STR);
    $statement->bindParam(":type6",$platform,PDO::PARAM_STR);
    $statement->bindParam(":type7",$choosenUsername,PDO::PARAM_STR);
    $statement->bindParam(":type8",$choosenGame,PDO::PARAM_STR);
    $statement->execute();
    header("location:/WebDatabase/Speedrun.php");
?>
