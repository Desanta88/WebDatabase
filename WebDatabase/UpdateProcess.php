<?php
    $title=$_GET["title"];
    $publisher=$_GET["publisher"];
    $publishingY=$_GET["publishingyear"];
    $timesSpeedrunned=$_GET["timesspeedrunned"];
    $server="localhost";
    $username="programma";
    $password="12345";
    $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $game=$_GET["VideogameU"];
    $query="UPDATE videogame SET Title=:type,PublishingYear=:type2,TimesSpeedrunned=:type3 WHERE Title=:type4";
    $query2="UPDATE editor e SET e.Name=:type5 WHERE e.Id=(SELECT v.Publisher FROM videogame v JOIN editor e ON v.Publisher=e.Id WHERE v.Title=:type6) ";
    $statement=$connection->prepare($query);
    $statement->bindParam(":type4",$game,PDO::PARAM_STR);
    $statement->bindParam(":type",$title,PDO::PARAM_STR);
    $statement->bindParam(":type2",$publishingY,PDO::PARAM_STR);
    $statement->bindParam(":type3",$timesSpeedrunned,PDO::PARAM_STR);
    $statement->execute();
    $statement=$connection->prepare($query2);
    $statement->bindParam(":type5",$publisher,PDO::PARAM_STR);
    $statement->bindParam(":type6",$game,PDO::PARAM_STR);
    $statement->execute();
    header("location:/WebDatabase/Videogame.php");
?>